<?php

use OurivesWeb\controller\Connection;
use OurivesWeb\Controller\Orders\Documents;
use OurivesWeb\Controller\Orders\PendingOrders;
use OurivesWeb\Error;
use OurivesWeb\Type\GetDocVnd;

if (isset($document) && $document instanceof Documents && $document->getError()) :
    $document->getError()->showError();
endif;

$Soap_Client = OurivesWeb\controller\Connection::Soap_Client(null, null);

wp_enqueue_script("jquery-Database");
wp_enqueue_script("jquery-modal");


global $wpdb;

$query = $wpdb->prepare("SELECT nome,morada,cod_postal,telefones,nif,capital,pais,img FROM OurivesWeb_api_Empresa WHERE main_token = %s", OURIVESWEB_ACCESS_TOKEN);
$results = $wpdb->get_results($query, ARRAY_N);
?>

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
</head>

<body>

<div id="profile" class="container-fluid text-center rounded-bottom">
    <div class="row">
        <div class="col-sm-2">
            <div class="row mt-auto mb-3">
                <div class="col-lg-12 img-responsive">
                    <img class="img-responsive" src="<?php echo esc_html(OURIVES_IMAGES_URL) ?>logo.svg"
                         href="<?php admin_url('admin.php?page=OurivesWeb') ?>" alt="OurivesWeb"
                         style="max-width: 100%; padding:20px 0px 0px 0px;" draggable="false">
                </div>
            </div>
            <div class="row mt-auto mb-9">
                <div class="col-lg-12 img-responsive">
                    <img alt="Admin" style="max-width:140px; padding:25px 0px 25px 0px"
                         class="img-responsive rounded-circle"
                         src="data:image/png;base64, <?php echo base64_decode($results[0][7]) ?>">
                    <span class="flag-icon flag-icon-gr"></span>

                </div>
            </div>
        </div>

        <div class="col-sm-10 text-left">
            <div class="row mt-12 mb-10" style="  text-align: left;">
                <h1 class="col-lg-12" style=" font-size:calc(12px + 2.0vw); margin-bottom:20px">Bem Vindo
                    <?php echo(isset($results[0][0]) ? esc_html(trim($results[0][0])) : "Empresa"); ?>
                    <span style="width:calc(20px + 2vw); height:calc(15px + 2vw);margin-top:15px!important;"
                          class="flag-icon flag-icon-<?php echo(isset($results[0][6]) ? esc_html(strtolower(trim($results[0][6]))) : ""); ?>"></span>
                </h1>


                <div class="row mt-auto mb-3 mb-12">
                    <div class="col  mb-3md-3 ml-3 ms-12 text">
                        <b>Morada: </b><a><?php echo(isset($results[0][1]) ? trim($results[0][1]) : ""); ?> </a>
                    </div>

                    <div class="col  mb-3md-3 ml-3 ms-12 text">
                        <b>Telefone: </b><a><?php echo(isset($results[0][3]) ? trim($results[0][3]) : ""); ?> </a>
                    </div>
                    <div class="col mb-3 md-3 ml-3 ms-12 text">
                        <b>Código-Postal: </b><a><?php echo(isset($results[0][2]) ? trim($results[0][2]) : ""); ?> </a>
                    </div>
                    <div class="col  mb-3md-3 ml-3 ms-12 text">
                        <b>NIF: </b><a><?php echo(isset($results[0][4]) ? trim($results[0][4]) : ""); ?> </a>
                    </div>
                </div>
            </div>

            <div class="row mb-6 mt-3">
                <div class="col mb-2">
                    <a type="submit" class="btn btn-primary nav-link btn"
                       href="<?php echo(admin_url('admin.php?page=OurivesWeb&tab=settings')); ?>">Configurações</a>
                </div>
                <div class="col mb-2">
                    <a type="submit" class="btn btn-primary nav-link btn"
                       href="<?php echo(admin_url('admin.php?page=OurivesWeb&tab=report')); ?>">Relatórios</a>
                </div>
                <div class="col-6"></div>
                <div class="col mb-2">
                    <a type="submit" class="btn btn-primary nav-link btn"
                       href="<?php echo(admin_url('admin.php?page=OurivesWeb&action=logout')); ?>">Terminar Sessão</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="Table_encomendas">
    <?php
    $Soap_Client = Connection::Soap_Client(null, null);
    $result = $Soap_Client["Obj"]->GetDocVnd(new GetDocVnd($Soap_Client["access_data"][0], $Soap_Client["access_data"][1]));
    $temp = $result->getGetDocVndResult();
    $xml = simplexml_load_string($temp) or die("Error: Cannot create object");
    ?>

    <?php $orders = PendingOrders::getAllAvailable($xml); ?>


    <div class="wrap">
        <h3><?php echo('Encomendas:') ?></h3>

        <div class="tablenav top">
            <div class="tablenav-pages">
                <?php PendingOrders::getPagination() ?>
            </div>
        </div>

        <table class='wp-list-table widefat fixed striped posts'>
            <thead>
            <tr>

                <th><a><?php echo('Encomenda') ?></a></th>
                <th><a><?php echo('Cliente') ?></a></th>
                <th><a><?php echo('Contribuinte') ?></a></th>
                <th><a><?php echo('Total') ?></a></th>
                <th><a><?php echo('Estado') ?></a></th>
                <th><a><?php echo('Data de Pagamento') ?></a></th>
                <th><a><?php echo('Método de Pagamento') ?></a></th>
                <th><a><?php echo('Visualizar Ficheiro') ?></a></th>
                <th class="text-center" style="width: 280px;"><a><?php echo('Gerar arquivo') ?></a></th>
            </tr>
            </thead>

            <?php if (!empty($orders) && is_array($orders)) : ?>
                <?php foreach ($orders as $order) : ?>
                    <tr id="OurivesWeb-pending-order-row-<?php echo($order['id']) ?>">
                        <td>
                            <a href=<?php echo(admin_url('post.php?post=' . $order['id'] . '&action=edit')) ?>>#<?php echo($order['number']) ?></a>
                        </td>
                        <td>
                            <?php
                            if (isset($order['info']['_billing_first_name']) && !empty($order['info']['_billing_first_name'])) {
                                echo $order['info']['_billing_first_name'] . ' ' . $order['info']['_billing_last_name'];
                            } else {
                                echo('Desconhecido');
                            }

                            ?>
                        <td><?php echo(isset($order['info'][VAT_FIELD]) ? $order['info'][VAT_FIELD] : '999999990') ?></td>
                        <td><?php echo($order['info']['_order_total'] . $order['info']['_order_currency']) ?></td>
                        <td><?php echo($order['status']) ?></td>
                        <td><?php echo(isset($order["info"]["_completed_date"]) ? print($order["info"]["_completed_date"]) : print("Sem data")) ?></td>
                        <td><?php echo($order["info"]["_payment_method_title"]) ?></td>
                        <td>
                            <form method="post" action="admin.php?page=OurivesWeb&action=getInvoice" name="form">

                                <input type="hidden" name="page" value="OurivesWeb">

                                <select name="id" style="margin-right: 5px">
                                    <?php
                                    foreach ($order["meta"] as $Doc_type) {
                                        echo("<option value='" . $Doc_type . "'>" . $Doc_type . "</option>");
                                    } ?>
                                </select>
                                <input type="submit" class="wp-core-ui button-primary"
                                       style="width: 80px; text-align: center; margin-right: 5px"
                                       value="<?php echo esc_html('Ver') ?>">


                            </form>
                        </td>
                        <td class="order_status column-order_status" style="text-align: right">
                            <form action="<?php admin_url('admin.php') ?>">
                                <input type="hidden" name="page" value="OurivesWeb">
                                <input type="hidden" name="action" value="genInvoice">
                                <input type="hidden" name="id" value="<?php echo($order['id']) ?>">
                                <select name="document_type" style="margin-right: 5px">
                                    <?php

                                    $ifselected = '';

                                    if (!(defined('DOCUMENT_TYPE'))) {
                                        echo("<option  selected> Selecione uma opção </option>");
                                        $ifselected = '';
                                    }
                                    foreach ($xml->children() as $Tipo) {
                                        if (defined('DOCUMENT_TYPE') && DOCUMENT_TYPE == trim($Tipo->documento)) {
                                            $ifselected = "selected";
                                        } else {
                                            $ifselected = '';
                                        }
                                        echo("<option value='" . $Tipo->documento . "' " . $ifselected . " >
                                                " . ($Tipo->descrição) .
                                            "</option>");
                                    } ?>
                                </select>

                                <input type="submit" class="button-primary"
                                       style="width: 80px; text-align: center; margin-right: 5px" value="Gerar">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php else : ?>
                <tr>
                    <td colspan="7">
                        <?php echo esc_html('Não foram encontadas encomendas!') ?>
                    </td>
                </tr>
            <?php endif; ?>
            <tfoot>
            <tr>
                <td class="manage-column column-cb check-column">
                    <label for="ourives-pending-orders-select-all-bottom" class="screen-reader-text"></label>
                    <input id="ourives-pending-orders-select-all-bottom" class="ourives-pending-orders-select-all"
                           type="checkbox">
                </td>
                <th><a><?php echo esc_html('Encomenda') ?></a></th>
                <th><a><?php echo esc_html('Cliente') ?></a></th>
                <th><a><?php echo esc_html('Contribuinte') ?></a></th>
                <th><a><?php echo esc_html('Total') ?></a></th>
                <th><a><?php echo esc_html('Estado') ?></a></th>
                <th><a><?php echo esc_html('Data de Pagamento') ?></a></th>
                <th><a><?php echo esc_html('Método de Pagamento') ?></a></th>
                <th></th>
            </tr>
            </tfoot>
        </table>
        <div class="tablenav bottom">
            <div class="tablenav-pages">
                <?php PendingOrders::getPagination() ?>
            </div>
        </div>
    </div>
</div>