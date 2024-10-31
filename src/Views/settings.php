<?php

use OurivesWeb\Model;
use OurivesWeb\Type\GetDocVnd;


$Soap_Client = OurivesWeb\Controller\Connection::Soap_Client(null, null);
global $wpdb;
$query = $wpdb->prepare("SELECT nome,morada,cod_postal,telefones,nif,capital,pais,img FROM OurivesWeb_api_Empresa WHERE main_token = %s", OURIVESWEB_ACCESS_TOKEN);
$results = $wpdb->get_results($query, ARRAY_N);
?>
<script>
    $('[data-toggle="tooltip"]').tooltip();
</script>
<div id="config" class="container" style="max-width:90%; ">
    <div class="row" style="margin-top:30px;">
        <div class="col-sm-2 text-center">
            <img class="img-responsive" src="<?php echo esc_html(OURIVES_IMAGES_URL) ?>logo.svg"
                 href="<?php admin_url('admin.php?page=OurivesWeb') ?>" alt="OurivesWeb"
                 style="max-width: 90%; padding:20px 0px 0px 0px;">
        </div>
        <div id="welcomediv" class="col-sm-8">
            <h2>Bem Vindo <?php echo(trim($results[0][0])) ?> </h2>
            <p class="lead">Configurações Básicas</p>
        </div>
        <div class="col-sm-2">
            <a class="nav-link" href="<?php echo(admin_url('admin.php?page=OurivesWeb')) ?>">
                <button type="button" class="btn btn-primary ">Página Inicial</button>
            </a>
        </div>
    </div>

    <div class="p-5 container" style="max-width:90%; ">
        <h3 class="border rounded text-center p-3 mb-3 ">Ferramentas</h3>
            <div class="row">

                <div class="col-md-6 mt-3">
                    <a type="submit" class="btn btn-primary  btn-block"
                       href='<?php echo(admin_url('admin.php?page=OurivesWeb&tab=settings&action=syncStocks')) ?>'
                       data-toggle="tooltip" title="Forçar sincronização de produtos">
                        Forçar sincronização dos produtos
                    </a>
                </div>
                <div class="col-md-6 mt-3">
                    <a type="submit" class="btn btn-primary btn-block"
                       href='<?php echo(admin_url('admin.php?page=OurivesWeb&tab=settings&action=Cat_SubCat')) ?>'
                       data-toggle="tooltip" title="Adicionar todas as Familias e sub Familias">
                        Adicionar família e sub-família
                    </a>

                </div>
            </div>
            <div class="row">

                <div class="col-md-6 mt-3">
                    <a type="submit" class="btn btn-primary   btn-block"
                       href='<?php echo(admin_url('admin.php?page=OurivesWeb&tab=settings&action=Taxes')) ?>'
                       data-toggle="tooltip" title="Adicionar taxas de IVA">
                        Adicionar taxas de IVA
                    </a>
                </div>
                <div class="col-md-6 mt-3">
                    <a type="submit" class="btn btn-warning   btn-block"
                       href='<?php echo(admin_url('admin.php?page=OurivesWeb&tab=settings&action=remLogs')) ?>'
                       data-toggle="tooltip" title="Eliminar logs diários">
                        Eliminar logs e relatórios armazenados
                    </a>
                </div>
            </div>
    </div>


    <form method='POST' action='<?php admin_url('admin.php?page=OurivesWeb&tab=settings') ?>' id='formOpcoes'>
        <input type='hidden' value='save' name='action'>
        <div class="p-5 container" style="max-width:90%; ">
            <div>
                <h3 class="border  rounded text-center p-3 mb-3 ">Campos em consideração</h3>
                <table class="table"
                       style="max-width:90%;margin-bottom:1% !important;  margin-left: auto; margin-right: auto; ">
                    <thead>
                    <tr>
                        <th scope="col"><label>Descrição</label></th>
                        <th scope="col"><label>Peso</label></th>
                        <th scope="col"><label>Custo Padrão</label></th>
                        <th scope="col"><label>Imagem</label></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                        <td>
                            <select id="IMPORT_DESC" name='opt[IMPORT_DESC]' class='form-control'>
                                <option value='1' <?php (defined('IMPORT_DESC') && IMPORT_DESC == '1' ? print('selected') : '') ?>><?php echo('Considerar') ?></option>
                                <option value='0' <?php (defined('IMPORT_DESC') && IMPORT_DESC == '0' ? print('selected') : '') ?>><?php echo('Ignorar') ?></option>
                            </select>
                        </td>
                        <td>
                            <select id="IMPORT_WEIGHT" name='opt[IMPORT_WEIGHT]' class='form-control'>
                                <option value='1' <?php (defined('IMPORT_WEIGHT') && IMPORT_WEIGHT == '1' ? print('selected') : '') ?>><?php echo('Considerar') ?></option>
                                <option value='0' <?php (defined('IMPORT_WEIGHT') && IMPORT_WEIGHT == '0' ? print('selected') : '') ?>><?php echo('Ignorar') ?></option>
                            </select>
                        </td>
                        <td>
                            <select id="IMPORT_CUSTOPDR" name='opt[IMPORT_CUSTOPDR]' class='form-control'>
                                <option value='1' <?php (defined('IMPORT_CUSTOPDR') && IMPORT_CUSTOPDR == '1' ? print('selected') : '') ?>><?php echo('Considerar') ?></option>
                                <option value='0' <?php (defined('IMPORT_CUSTOPDR') && IMPORT_CUSTOPDR == '0' ? print('selected') : '') ?>><?php echo('Ignorar') ?></option>
                            </select>
                        </td>
                        <td>
                            <select id="IMPORT_IMAGEM" name='opt[IMPORT_IMAGEM]' class='form-control'>
                                <option value='1' <?php (defined('IMPORT_IMAGEM') && IMPORT_IMAGEM == '1' ? print('selected') : '') ?>><?php echo('Considerar') ?></option>
                                <option value='0' <?php (defined('IMPORT_IMAGEM') && IMPORT_IMAGEM == '0' ? print('selected') : '') ?>><?php echo('Ignorar') ?></option>
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table class="table"
                       style="max-width:90%;margin-bottom:1% !important;  margin-left: auto; margin-right: auto; ">
                    <thead>
                    <tr>
                        <th scope="col"><label>Familia</label></th>
                        <th scope="col"><label>Sub - Familia</label></th>
                        <th scope="col"><label>Materia</label></th>
                        <th scope="col"><label>Sub - Materia</label></th>
                        <th scope="col"><label>Toque</label></th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <select id="IMPORT_FAMILIA" name='opt[IMPORT_FAMILIA]' class='form-control'>
                                <option value='1' <?php (defined('IMPORT_FAMILIA') && IMPORT_FAMILIA == '1' ? print('selected') : '') ?>><?php echo('Considerar') ?></option>
                                <option value='0' <?php (defined('IMPORT_FAMILIA') && IMPORT_FAMILIA == '0' ? print('selected') : '') ?>><?php echo('Ignorar') ?></option>
                            </select>
                        </td>
                        <td>
                            <select id="IMPORT_SUBFAMILIA" name='opt[IMPORT_SUBFAMILIA]' class='form-control'>
                                <option value='1' <?php (defined('IMPORT_SUBFAMILIA') && IMPORT_SUBFAMILIA == '1' ? print('selected') : '') ?>><?php echo('Considerar') ?></option>
                                <option value='0' <?php (defined('IMPORT_SUBFAMILIA') && IMPORT_SUBFAMILIA == '0' ? print('selected') : '') ?>><?php echo('Ignorar') ?></option>
                            </select>
                        </td>
                        <td>
                            <select id="IMPORT_MATERIA" name='opt[IMPORT_MATERIA]' class='form-control'>
                                <option value='1' <?php (defined('IMPORT_MATERIA') && IMPORT_MATERIA == '1' ? print('selected') : '') ?>><?php echo('Considerar') ?></option>
                                <option value='0' <?php (defined('IMPORT_MATERIA') && IMPORT_MATERIA == '0' ? print('selected') : '') ?>><?php echo('Ignorar') ?></option>
                            </select>
                        </td>
                        <td>
                            <select id="IMPORT_SUBMATERIA" name='opt[IMPORT_SUBMATERIA]' class='form-control'>
                                <option value='1' <?php (defined('IMPORT_SUBMATERIA') && IMPORT_SUBMATERIA == '1' ? print('selected') : '') ?>><?php echo('Considerar') ?></option>
                                <option value='0' <?php (defined('IMPORT_SUBMATERIA') && IMPORT_SUBMATERIA == '0' ? print('selected') : '') ?>><?php echo('Ignorar') ?></option>
                            </select>
                        </td>
                        <td>
                            <select id="IMPORT_TOQUE" name='opt[IMPORT_TOQUE]' class='form-control'>
                                <option value='1' <?php (defined('IMPORT_TOQUE') && IMPORT_TOQUE == '1' ? print('selected') : '') ?>><?php echo('Considerar') ?></option>
                                <option value='0' <?php (defined('IMPORT_TOQUE') && IMPORT_TOQUE == '0' ? print('selected') : '') ?>><?php echo('Ignorar') ?></option>
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table class="table"
                       style="max-width:90%;margin-bottom:1% !important;  margin-left: auto; margin-right: auto; ">
                    <thead>
                    <tr>
                        <th scope="col"><label>Genero</label></th>
                        <th scope="col"><label>Tema</label></th>
                        <th scope="col"><label>Origem</label></th>
                        <th scope="col"><label>Marca</label></th>
                        <th scope="col"><label>Coleção</label></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <select id="IMPORT_GENERO" name='opt[IMPORT_GENERO]' class='form-control'>
                                <option value='1' <?php (defined('IMPORT_GENERO') && IMPORT_GENERO == '1' ? print('selected') : '') ?>><?php echo('Considerar') ?></option>
                                <option value='0' <?php (defined('IMPORT_GENERO') && IMPORT_GENERO == '0' ? print('selected') : '') ?>><?php echo('Ignorar') ?></option>
                            </select>
                        </td>
                        <td>
                            <select id="IMPORT_TEMA" name='opt[IMPORT_TEMA]' class='form-control'>
                                <option value='1' <?php (defined('IMPORT_TEMA') && IMPORT_TEMA == '1' ? print('selected') : '') ?>><?php echo('Considerar') ?></option>
                                <option value='0' <?php (defined('IMPORT_TEMA') && IMPORT_TEMA == '0' ? print('selected') : '') ?>><?php echo('Ignorar') ?></option>
                            </select>
                        </td>
                        <td>
                            <select id="IMPORT_ORIGEM" name='opt[IMPORT_ORIGEM]' class='form-control'>
                                <option value='1' <?php (defined('IMPORT_ORIGEM') && IMPORT_ORIGEM == '1' ? print('selected') : '') ?>><?php echo('Considerar') ?></option>
                                <option value='0' <?php (defined('IMPORT_ORIGEM') && IMPORT_ORIGEM == '0' ? print('selected') : '') ?>><?php echo('Ignorar') ?></option>
                            </select>
                        </td>
                        <td>
                            <select id="IMPORT_MARCA" name='opt[IMPORT_MARCA]' class='form-control'>
                                <option value='1' <?php (defined('IMPORT_MARCA') && IMPORT_MARCA == '1' ? print('selected') : '') ?>><?php echo('Considerar') ?></option>
                                <option value='0' <?php (defined('IMPORT_MARCA') && IMPORT_MARCA == '0' ? print('selected') : '') ?>><?php echo('Ignorar') ?></option>
                            </select>
                        </td>
                        <td>
                            <select id="IMPORT_COLECAO" name='opt[IMPORT_COLECAO]' class='form-control'>
                                <option value='1' <?php (defined('IMPORT_COLECAO') && IMPORT_COLECAO == '1' ? print('selected') : '') ?>><?php echo('Considerar') ?></option>
                                <option value='0' <?php (defined('IMPORT_COLECAO') && IMPORT_COLECAO == '0' ? print('selected') : '') ?>><?php echo('Ignorar') ?></option>
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h4 class="border  rounded text-center p-3 mb-3 ">Configurações</h4>
            <h4 class="mb-3">Sincronização</h4>
            <div class="col-md-12">
                <div class="row" style="border-bottom: 1.5px double #3c4e61;padding-bottom:3vh; ">
                    <div class="col-md-4">
                        <label for="import_status"><?php echo('Estado do Artigo') ?></label>
                        <select id="import_status" name='opt[import_status]' class='form-control'>
                            <option value='1' <?php (defined('IMPORT_STATUS') && IMPORT_STATUS == '1' ? print('selected') : '') ?>><?php echo('Rascunho') ?></option>
                            <option value='0' <?php (defined('IMPORT_STATUS') && IMPORT_STATUS == '0' ? print('selected') : '') ?>><?php echo('Publicado') ?></option>
                        </select>
                        <p class='description'><?php echo('Obrigatório') ?></p>
                    </div>
                    <div class="col-md-4">
                        <label for="PVP_PRICE"><?php echo('PVP - Preço normal') ?></label>
                        <select id="PVP_PRICE" name='opt[PVP_PRICE]' class='form-control'>
                            <option value='pvp1' <?php (defined('PVP_PRICE') && PVP_PRICE == 'pvp1' ? print('selected') : '') ?>><?php echo('Preço de Venda') ?></option>
                            <option value='pvp2' <?php (defined('PVP_PRICE') && PVP_PRICE == 'pvp2' ? print('selected') : '') ?>><?php echo('2º Preço') ?></option>
                            <option value='pvp3' <?php (defined('PVP_PRICE') && PVP_PRICE == 'pvp3' ? print('selected') : '') ?>><?php echo('3º Preço') ?></option>
                            <option value='pvpiva1' <?php (defined('PVP_PRICE') && PVP_PRICE == 'pvpiva1' ? print('selected') : '') ?>><?php echo('1º Preço com IVA') ?></option>
                            <option value='pvpiva2' <?php (defined('PVP_PRICE') && PVP_PRICE == 'pvpiva2' ? print('selected') : '') ?>><?php echo('2º Preço com IVA') ?></option>
                            <option value='pvpiva3' <?php (defined('PVP_PRICE') && PVP_PRICE == 'pvpiva3' ? print('selected') : '') ?>><?php echo('3º Preço com IVA') ?></option>
                        </select>
                        <p class='description'>Obrigatório</p>
                        <p><a class="btn btn-primary" data-bs-toggle="collapse" href="#PVP" role="button"
                              aria-expanded="false" aria-controls="PVP">Mais Informações</a></p>

                    </div>
                    <div class="col-md-4">
                        <label for="PVP_SALE"><?php echo('PVP - Preço promocional') ?></label>
                        <select id="PVP_SALE" name='opt[PVP_SALE]' class='form-control'>
                            <option value='pvp1' <?php (defined('PVP_SALE') && PVP_SALE == 'pvp1' ? print('selected') : '') ?>><?php echo('Preço de Venda') ?></option>
                            <option value='pvp2' <?php (defined('PVP_SALE') && PVP_SALE == 'pvp2' ? print('selected') : '') ?>><?php echo('2º Preço') ?></option>
                            <option value='pvp3' <?php (defined('PVP_SALE') && PVP_SALE == 'pvp3' ? print('selected') : '') ?>><?php echo('3º Preço') ?></option>
                            <option value='pvpiva1' <?php (defined('PVP_SALE') && PVP_SALE == 'pvpiva1' ? print('selected') : '') ?>><?php echo('1º Preço com IVA') ?></option>
                            <option value='pvpiva2' <?php (defined('PVP_SALE') && PVP_SALE == 'pvpiva2' ? print('selected') : '') ?>><?php echo('2º Preço com IVA') ?></option>
                            <option value='pvpiva3' <?php (defined('PVP_SALE') && PVP_SALE == 'pvpiva3' ? print('selected') : '') ?>><?php echo('3º Preço com IVA') ?></option>
                        </select>
                        <p class='description'>Obrigatório</p>
                    </div>
                    <div class="collapse" id="PVP">
                        Por favor, certifique-se que o "PVP - Preço normal" selecionado tem sempre valor superior ao
                        campo selecionado para o "PVP - Preço promocional".
                        <br>
                        Caso não aconteça o produto irá ser importado sem preço promocional.
                    </div>

                </div>

                <h4 class="mb-3">Documentos</h4>
                <div class="row" style="border-bottom: 1px double #3c4e61; margin-top:20px; padding-bottom:3vh;">

                    <div class="col-md-4">
                        <label for="document_type"><?php echo('Tipo de documento') ?></label>
                        <select id="document_type" name='opt[document_type]' class=' form-control'>
                            <?php
                            if (!(defined('DOCUMENT_TYPE'))) {
                                echo("<option  selected>Escolha uma opção</option>");
                            }

                            $result = $Soap_Client["Obj"]->GetDocVnd(new GetDocVnd($Soap_Client["access_data"][0], $Soap_Client["access_data"][1]));
                            $temp = $result->getGetDocVndResult();
                            $xml = simplexml_load_string($temp) or die("Error: Cannot create object");
                            foreach ($xml->children() as $Tipo) {
                                (defined('DOCUMENT_TYPE') && DOCUMENT_TYPE == trim($Tipo->documento)) ? $ifselected = "selected" : $ifselected = "";
                                echo("<option value=" . $Tipo->documento . " " . $ifselected . " >
                                                    " . ($Tipo->descrição) .
                                    "</option>");
                            }
                            ?>
                        </select>
                        <p class='description'><?php echo('Obrigatório') ?></p>
                    </div>

                    <div class="col-md-4">
                        <label for="document_set_id"><?php echo('Série de documento') ?></label>
                        <input id="document_set_id" maxlength="3" name='opt[document_set_id]' required=""
                               value="<?php echo(DOCUMENT_SET_ID); ?>" class='form-control'></select>
                        <p class='description'><?php echo('Obrigatório') ?></p>
                    </div>
                    <div class="col-md-4">
                        <label for="doc_auto"><?php echo('Gerar Documentos') ?></label>
                        <select id="doc_auto" name='opt[doc_auto]' class='form-control'>
                            <option value='1' <?php (defined('DOC_AUTO') && DOC_AUTO == '1' ? print('selected') : '') ?>><?php echo('Automáticamente') ?></option>
                            <option value='0' <?php (defined('DOC_AUTO') && DOC_AUTO == '0' ? print('selected') : '') ?>><?php echo('Manualmente') ?></option>
                        </select>
                        <p class='description'><?php echo('Obrigatório') ?></p>
                    </div>
                    <div style="display: none;" class="col-md-4 md-3">
                        <label for="document_status"><?php echo('Estado do documento') ?></label>
                        <select disabled id="document_status" name='opt[document_status]' class='form-control'>
                            <option value='0' <?php (defined('DOCUMENT_STATUS') && DOCUMENT_STATUS == '0' ? print('selected') : '') ?>><?php echo('Fechado') ?></option>
                            <option value='1' <?php (defined('DOCUMENT_STATUS') && DOCUMENT_STATUS == '1' ? print('selected') : '') ?>><?php echo('Rascunho') ?></option>
                        </select>
                        <input type="hidden" name="opt[document_status]" value="0"/>
                        <p class='description'><?php echo('Obrigatório') ?></p>
                    </div>
                </div>

                <div class="mb-3 ">

                    <h4 class="mb-3"><br><?php echo('Clientes') ?></h4>
                    <label for="username"> Contribuinte do cliente </label>
                    <div class="input-group">
                        <?php $customFields = Model::getCustomFields(); ?>
                        <select id="vat_field" name='opt[vat_field]' class='form-control'>

                            <?php
                            defined('VAT_FIELD') && in_array(VAT_FIELD, $customFields) ? $ifselected = "" : $ifselected = "";
                            echo("<option value=''" . $ifselected . ">" . ('Escolha uma opção') . "</option>");
                            if (is_array($customFields)) {
                                foreach ($customFields as $customField) {

                                    if (VAT_FIELD == $customField['meta_key']) {
                                        $ifselected = 'selected';
                                    } else {
                                        $ifselected = "";
                                    }
                                    echo('<option value="' . $customField['meta_key'] . '" ' . $ifselected . '>' . $customField['meta_key'] . '</option>');
                                }
                            } ?>
                        </select>
                    </div>

                    <div class="mb-3 mt-1">
                        <p>
                            <a class="btn btn-primary icon-question-sign" style="padding-top:0.5rem;"
                               data-bs-toggle="collapse" href="#NIF" role="button" aria-expanded="false"
                               aria-controls="NIF">Mais Informações</a>
                        </p>
                        <div class="collapse" id="NIF">
                            Campo especial associado ao Numero de contribuinte do cliente. Se o campo não aparecer,
                            certifique-se que tem pelo menos uma encomenda com o campo em uso.
                            <br>
                            Para que o Custom Field apareça, deverá ter pelo menos uma encomenda com o contribuinte
                            preenchido.>
                            <br>

                            Se ainda não tiver nenhum campo para o contribuinte, poderá adicionar o plugin disponível <a
                                    target="_blank" href="https://wordpress.org/plugins/OurivesWeb-eu-vat/">aqui.</a>
                        </div>
                    </div>
                    <h3 class="border  rounded text-center p-3 mb-3 ">Sincronização Automática</h3>
                    <div class="d-block my-3" id="ourivesweb_stock_sync">

                        <label class="btn btn-primary  btn-block">
                            <?php
                            if (defined('OURIVESWEB_STOCK_SYNC') && OURIVESWEB_STOCK_SYNC == "1") {
                                $ifselectedAuto = "checked";
                                $ifselected = "";
                            } else {
                                $ifselectedAuto = "";
                                $ifselected = "checked";
                            }
                            echo('
                                                        <input type="radio" name="opt[ourivesweb_stock_sync]" value="1" ' . $ifselectedAuto . ' >Sincronização Automática
                                                    </label>

                                                    <label class="btn btn-secondary  btn-block" >
                                                    <input type="radio" name="opt[ourivesweb_stock_sync]" value="0" ' . $ifselected . ' >Sincronização Manual
                                                    </label>
                                                    ');
                            $ifselectedAuto = "";
                            $ifselected = "";
                            ?>

                    </div>

                    <style>
                        #ourivesweb_stock_sync_time .slidecontainer {
                            width: 100%;
                            height: 100px;
                        }

                        #ourivesweb_stock_sync_time .slider {
                            -webkit-appearance: none;
                            width: 100%;
                            height: 25px;
                            background: #d3d3d3;
                            outline: none;
                            opacity: 0.7;
                            -webkit-transition: .2s;
                            transition: opacity .2s;
                        }

                        #ourivesweb_stock_sync_time .slider:hover {
                            opacity: 1;
                        }

                        #ourivesweb_stock_sync_time .slider::-webkit-slider-thumb {
                            -webkit-appearance: none;
                            appearance: none;
                            width: 25px;
                            height: 25px;
                            background: #4CAF50;
                            cursor: pointer;
                        }

                        #ourivesweb_stock_sync_time .slider::-moz-range-thumb {
                            width: 25px;
                            height: 25px;
                            background: #4CAF50;
                            cursor: pointer;
                        }
                    </style>

                    <div class="d-block my-3" id="ourivesweb_stock_sync_time">

                        <label class="slidecontainer">
                            <?php
                            if (defined('OURIVESWEB_STOCK_SYNC_TIME')) {
                                echo '
                                    <label for="ourivesweb_stock_sync_time">' . ("Intervalo para sincronização automática") . '<p>Valor: <span id="demo"></span></p></label>
                                    <input type="range" min="300" max="43200" step="300" id="myRange" class="slider" placeholder="Intervalo para sincronização automática" name="opt[ourivesweb_stock_sync_time]" value=' . OURIVESWEB_STOCK_SYNC_TIME . '>';
                            } ?>
                        </label>
                        <script>
                            function secondsToHms(d) {
                                d = Number(d);

                                var h = Math.floor(d / 3600);
                                var m = Math.floor(d % 3600 / 60);
                                var s = Math.floor(d % 3600 % 60);

                                return ('0' + h).slice(-2) + ":" + ('0' + m).slice(-2) + ":" + ('0' + s).slice(-2);
                            }

                            var slider = document.getElementById("myRange");
                            var output = document.getElementById("demo");
                            output.innerHTML = secondsToHms(slider.value);

                            slider.oninput = function () {
                                output.innerHTML = secondsToHms(this.value);
                            }
                        </script>


                    </div>
                </div>
                <input class="btn btn-primary  btn-block mt-3 " type="submit" name="submit" id="submit"
                       value="<?php echo('Guardar alterações') ?>"></button>
            </div>
    </form>
</div>