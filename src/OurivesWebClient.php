<?php

namespace OurivesWeb;

use OurivesWeb\Type;
use OurivesWeb\Type\CloseInvoice;
use OurivesWeb\Type\CloseInvoiceResponse;
use OurivesWeb\Type\DeleteInvoice;
use OurivesWeb\Type\DeleteInvoiceResponse;
use OurivesWeb\Type\DownloadImage;
use OurivesWeb\Type\DownloadImageResponse;
use OurivesWeb\Type\DownloadImages;
use OurivesWeb\Type\DownloadImagesResponse;
use OurivesWeb\Type\EditArtigo;
use OurivesWeb\Type\EditArtigoResponse;
use OurivesWeb\Type\EditCliente;
use OurivesWeb\Type\EditClienteResponse;
use OurivesWeb\Type\EditFamilia;
use OurivesWeb\Type\EditFamiliaResponse;
use OurivesWeb\Type\EditFornecedor;
use OurivesWeb\Type\EditFornecedorResponse;
use OurivesWeb\Type\EditMarca;
use OurivesWeb\Type\EditMarcaResponse;
use OurivesWeb\Type\EditOutro;
use OurivesWeb\Type\EditOutroResponse;
use OurivesWeb\Type\EditSubFamilia;
use OurivesWeb\Type\EditSubFamiliaResponse;
use OurivesWeb\Type\EditVendedor;
use OurivesWeb\Type\EditVendedorResponse;
use OurivesWeb\Type\GetArtigoCod;
use OurivesWeb\Type\GetArtigoCodResponse;
use OurivesWeb\Type\GetArtigoFamSfa;
use OurivesWeb\Type\GetArtigoFamSfaResponse;
use OurivesWeb\Type\GetArtigoMarca;
use OurivesWeb\Type\GetArtigoMarcaResponse;
use OurivesWeb\Type\GetArtigoRef;
use OurivesWeb\Type\GetArtigoRefResponse;
use OurivesWeb\Type\GetArtigos;
use OurivesWeb\Type\GetArtigosImageList;
use OurivesWeb\Type\GetArtigosImageListResponse;
use OurivesWeb\Type\GetArtigosResponse;
use OurivesWeb\Type\GetArtigoStockRef;
use OurivesWeb\Type\GetArtigoStockRefResponse;
use OurivesWeb\Type\GetArtigosUpdates;
use OurivesWeb\Type\GetArtigosUpdatesbyMinutes;
use OurivesWeb\Type\GetArtigosUpdatesbyMinutesResponse;
use OurivesWeb\Type\GetArtigosUpdatesResponse;
use OurivesWeb\Type\GetAssSerie;
use OurivesWeb\Type\GetAssSerieResponse;
use OurivesWeb\Type\GetCcrCli;
use OurivesWeb\Type\GetCcrCliResponse;
use OurivesWeb\Type\GetCcrFor;
use OurivesWeb\Type\GetCcrForResponse;
use OurivesWeb\Type\GetClientes;
use OurivesWeb\Type\GetClientesMail;
use OurivesWeb\Type\GetClientesMailResponse;
use OurivesWeb\Type\GetClientesNif;
use OurivesWeb\Type\GetClientesNifResponse;
use OurivesWeb\Type\GetClientesNumero;
use OurivesWeb\Type\GetClientesNumeroResponse;
use OurivesWeb\Type\GetClientesResponse;
use OurivesWeb\Type\GetClientesTlf;
use OurivesWeb\Type\GetClientesTlfResponse;
use OurivesWeb\Type\GetCliVendas;
use OurivesWeb\Type\GetCliVendasResponse;
use OurivesWeb\Type\GetCondPag;
use OurivesWeb\Type\GetCondPagResponse;
use OurivesWeb\Type\GetDocVnd;
use OurivesWeb\Type\GetDocVndResponse;
use OurivesWeb\Type\GetEmpresa;
use OurivesWeb\Type\GetEmpresaResponse;
use OurivesWeb\Type\GetFamilias;
use OurivesWeb\Type\GetFamiliasResponse;
use OurivesWeb\Type\GetFornece;
use OurivesWeb\Type\GetForneceMail;
use OurivesWeb\Type\GetForneceMailResponse;
use OurivesWeb\Type\GetForneceNif;
use OurivesWeb\Type\GetForneceNifResponse;
use OurivesWeb\Type\GetForneceNumero;
use OurivesWeb\Type\GetForneceNumeroResponse;
use OurivesWeb\Type\GetForneceResponse;
use OurivesWeb\Type\GetForneceTlf;
use OurivesWeb\Type\GetForneceTlfResponse;
use OurivesWeb\Type\GetMarcas;
use OurivesWeb\Type\GetMarcasResponse;
use OurivesWeb\Type\GetMaterias;
use OurivesWeb\Type\GetMateriasResponse;
use OurivesWeb\Type\GetModPag;
use OurivesWeb\Type\GetModPagResponse;
use OurivesWeb\Type\GetMotivosCredito;
use OurivesWeb\Type\GetMotivosCreditoResponse;
use OurivesWeb\Type\GetMotivosIsento;
use OurivesWeb\Type\GetMotivosIsentoResponse;
use OurivesWeb\Type\GetPaises;
use OurivesWeb\Type\GetPaisesResponse;
use OurivesWeb\Type\GetPndCli;
use OurivesWeb\Type\GetPndCliResponse;
use OurivesWeb\Type\GetPndFor;
use OurivesWeb\Type\GetPndForResponse;
use OurivesWeb\Type\GetSeccoes;
use OurivesWeb\Type\GetSeccoesResponse;
use OurivesWeb\Type\GetStockUpdates;
use OurivesWeb\Type\GetStockUpdatesbyMinutes;
use OurivesWeb\Type\GetStockUpdatesbyMinutesResponse;
use OurivesWeb\Type\GetStockUpdatesResponse;
use OurivesWeb\Type\GetSubFamilias;
use OurivesWeb\Type\GetSubFamiliasResponse;
use OurivesWeb\Type\GetToques;
use OurivesWeb\Type\GetToquesResponse;
use OurivesWeb\Type\GetVenda;
use OurivesWeb\Type\GetVendaLinhas;
use OurivesWeb\Type\GetVendaLinhasResponse;
use OurivesWeb\Type\GetVendaResponse;
use OurivesWeb\Type\GetVendas;
use OurivesWeb\Type\GetVendasResponse;
use OurivesWeb\Type\GetVendedores;
use OurivesWeb\Type\GetVendedoresResponse;
use OurivesWeb\Type\InsertInvoice;
use OurivesWeb\Type\InsertInvoiceLine;
use OurivesWeb\Type\InsertInvoiceLineResponse;
use OurivesWeb\Type\InsertInvoiceResponse;
use OurivesWeb\Type\InvoiceMotivoCredito;
use OurivesWeb\Type\InvoiceMotivoCreditoResponse;
use OurivesWeb\Type\InvoiceMotivoIsento;
use OurivesWeb\Type\InvoiceMotivoIsentoResponse;
use OurivesWeb\Type\InvoicePdf;
use OurivesWeb\Type\InvoicePdfResponse;
use OurivesWeb\Type\InvoiceTransporte;
use OurivesWeb\Type\InvoiceTransporteResponse;
use OurivesWeb\Type\PayInvoice;
use OurivesWeb\Type\PayInvoiceResponse;
use OurivesWeb\Type\ReceiptPdf;
use OurivesWeb\Type\ReceiptPdfResponse;
use OurivesWeb\Type\UpLoadImage;
use OurivesWeb\Type\UpLoadImageResponse;
use OurivesWeb\Type\ValidaLogin;
use OurivesWeb\Type\ValidaLoginResponse;
use OurivesWeb\Type\Versao;
use OurivesWeb\Type\VersaoResponse;
use Phpro\SoapClient\Client;
use Phpro\SoapClient\Exception\SoapException;
use Phpro\SoapClient\Type\RequestInterface;
use Phpro\SoapClient\Type\ResultInterface;

class OurivesWebClient extends Client
{

    /**
     * @param RequestInterface|Versao $parameters
     * @return ResultInterface|VersaoResponse
     * @throws SoapException
     */
    public function versao(Versao $parameters): VersaoResponse
    {
        return $this->call('Versao', $parameters);
    }

    /**
     * @param RequestInterface|ValidaLogin $parameters
     * @return ResultInterface|ValidaLoginResponse
     * @throws SoapException
     */
    public function validaLogin(ValidaLogin $parameters): ValidaLoginResponse
    {
        return $this->call('ValidaLogin', $parameters);
    }

    /**
     * @param RequestInterface|GetEmpresa $parameters
     * @return ResultInterface|GetEmpresaResponse
     * @throws SoapException
     */
    public function getEmpresa(GetEmpresa $parameters): GetEmpresaResponse
    {
        return $this->call('GetEmpresa', $parameters);
    }

    /**
     * @param RequestInterface|InvoiceTransporte $parameters
     * @return ResultInterface|InvoiceTransporteResponse
     * @throws SoapException
     */
    public function invoiceTransporte(InvoiceTransporte $parameters): InvoiceTransporteResponse
    {
        return $this->call('InvoiceTransporte', $parameters);
    }

    /**
     * @param RequestInterface|GetArtigosImageList $parameters
     * @return ResultInterface|GetArtigosImageListResponse
     * @throws SoapException
     */
    public function getArtigosImageList(GetArtigosImageList $parameters): GetArtigosImageListResponse
    {
        return $this->call('GetArtigosImageList', $parameters);
    }

    /**
     * @param RequestInterface|GetArtigoStockRef $parameters
     * @return ResultInterface|GetArtigoStockRefResponse
     * @throws SoapException
     */
    public function getArtigoStockRef(GetArtigoStockRef $parameters): GetArtigoStockRefResponse
    {
        return $this->call('GetArtigoStockRef', $parameters);
    }

    /**
     * @param RequestInterface|GetPaises $parameters
     * @return ResultInterface|GetPaisesResponse
     * @throws SoapException
     */
    public function getPaises(GetPaises $parameters): GetPaisesResponse
    {
        return $this->call('GetPaises', $parameters);
    }

    /**
     * @param RequestInterface|GetClientes $parameters
     * @return ResultInterface|GetClientesResponse
     * @throws SoapException
     */
    public function getClientes(GetClientes $parameters): GetClientesResponse
    {
        return $this->call('GetClientes', $parameters);
    }

    /**
     * @param RequestInterface|GetFornece $parameters
     * @return ResultInterface|GetForneceResponse
     * @throws SoapException
     */
    public function getFornece(GetFornece $parameters): GetForneceResponse
    {
        return $this->call('GetFornece', $parameters);
    }

    /**
     * @param RequestInterface|GetForneceNumero $parameters
     * @return ResultInterface|GetForneceNumeroResponse
     * @throws SoapException
     */
    public function getForneceNumero(GetForneceNumero $parameters): GetForneceNumeroResponse
    {
        return $this->call('GetForneceNumero', $parameters);
    }

    /**
     * @param RequestInterface|GetForneceNif $parameters
     * @return ResultInterface|GetForneceNifResponse
     * @throws SoapException
     */
    public function getForneceNif(GetForneceNif $parameters): GetForneceNifResponse
    {
        return $this->call('GetForneceNif', $parameters);
    }

    /**
     * @param RequestInterface|GetForneceMail $parameters
     * @return ResultInterface|GetForneceMailResponse
     * @throws SoapException
     */
    public function getForneceMail(GetForneceMail $parameters): GetForneceMailResponse
    {
        return $this->call('GetForneceMail', $parameters);
    }

    /**
     * @param RequestInterface|GetForneceTlf $parameters
     * @return ResultInterface|GetForneceTlfResponse
     * @throws SoapException
     */
    public function getForneceTlf(GetForneceTlf $parameters): GetForneceTlfResponse
    {
        return $this->call('GetForneceTlf', $parameters);
    }

    /**
     * @param RequestInterface|GetCcrCli $parameters
     * @return ResultInterface|GetCcrCliResponse
     * @throws SoapException
     */
    public function getCcrCli(GetCcrCli $parameters): GetCcrCliResponse
    {
        return $this->call('GetCcrCli', $parameters);
    }

    /**
     * @param RequestInterface|GetStockUpdates $parameters
     * @return ResultInterface|GetStockUpdatesResponse
     * @throws SoapException
     */
    public function getStockUpdates(GetStockUpdates $parameters): GetStockUpdatesResponse
    {
        return $this->call('GetStockUpdates', $parameters);
    }

    /**
     * @param RequestInterface|GetStockUpdatesbyMinutes $parameters
     * @return ResultInterface|GetStockUpdatesbyMinutesResponse
     * @throws SoapException
     */
    public function getStockUpdatesbyMinutes(GetStockUpdatesbyMinutes $parameters): GetStockUpdatesbyMinutesResponse
    {
        return $this->call('GetStockUpdatesbyMinutes', $parameters);
    }

    /**
     * @param RequestInterface|GetArtigosUpdates $parameters
     * @return ResultInterface|GetArtigosUpdatesResponse
     * @throws SoapException
     */
    public function getArtigosUpdates(GetArtigosUpdates $parameters): GetArtigosUpdatesResponse
    {
        return $this->call('GetArtigosUpdates', $parameters);
    }

    /**
     * @param RequestInterface|GetArtigosUpdatesbyMinutes $parameters
     * @return ResultInterface|GetArtigosUpdatesbyMinutesResponse
     * @throws SoapException
     */
    public function getArtigosUpdatesbyMinutes(GetArtigosUpdatesbyMinutes $parameters): GetArtigosUpdatesbyMinutesResponse
    {
        return $this->call('GetArtigosUpdatesbyMinutes', $parameters);
    }

    /**
     * @param RequestInterface|UpLoadImage $parameters
     * @return ResultInterface|UpLoadImageResponse
     * @throws SoapException
     */
    public function upLoadImage(UpLoadImage $parameters): UpLoadImageResponse
    {
        return $this->call('UpLoadImage', $parameters);
    }

    /**
     * @param RequestInterface|DownloadImage $parameters
     * @return ResultInterface|DownloadImageResponse
     * @throws SoapException
     */
    public function downloadImage(DownloadImage $parameters): DownloadImageResponse
    {
        return $this->call('DownloadImage', $parameters);
    }

    /**
     * @param RequestInterface|DownloadImages $parameters
     * @return ResultInterface|DownloadImagesResponse
     * @throws SoapException
     */
    public function downloadImages(DownloadImages $parameters): DownloadImagesResponse
    {
        return $this->call('DownloadImages', $parameters);
    }

    /**
     * @param RequestInterface|GetPndCli $parameters
     * @return ResultInterface|GetPndCliResponse
     * @throws SoapException
     */
    public function getPndCli(GetPndCli $parameters): GetPndCliResponse
    {
        return $this->call('GetPndCli', $parameters);
    }

    /**
     * @param RequestInterface|GetCliVendas $parameters
     * @return ResultInterface|GetCliVendasResponse
     * @throws SoapException
     */
    public function getCliVendas(GetCliVendas $parameters): GetCliVendasResponse
    {
        return $this->call('GetCliVendas', $parameters);
    }

    /**
     * @param RequestInterface|GetVendas $parameters
     * @return ResultInterface|GetVendasResponse
     * @throws SoapException
     */
    public function getVendas(GetVendas $parameters): GetVendasResponse
    {
        return $this->call('GetVendas', $parameters);
    }

    /**
     * @param RequestInterface|GetVenda $parameters
     * @return ResultInterface|GetVendaResponse
     * @throws SoapException
     */
    public function getVenda(GetVenda $parameters): GetVendaResponse
    {
        return $this->call('GetVenda', $parameters);
    }

    /**
     * @param RequestInterface|GetVendaLinhas $parameters
     * @return ResultInterface|GetVendaLinhasResponse
     * @throws SoapException
     */
    public function getVendaLinhas(GetVendaLinhas $parameters): GetVendaLinhasResponse
    {
        return $this->call('GetVendaLinhas', $parameters);
    }

    /**
     * @param RequestInterface|GetPndFor $parameters
     * @return ResultInterface|GetPndForResponse
     * @throws SoapException
     */
    public function getPndFor(GetPndFor $parameters): GetPndForResponse
    {
        return $this->call('GetPndFor', $parameters);
    }

    /**
     * @param RequestInterface|GetCcrFor $parameters
     * @return ResultInterface|GetCcrForResponse
     * @throws SoapException
     */
    public function getCcrFor(GetCcrFor $parameters): GetCcrForResponse
    {
        return $this->call('GetCcrFor', $parameters);
    }

    /**
     * @param RequestInterface|GetClientesNumero $parameters
     * @return ResultInterface|GetClientesNumeroResponse
     * @throws SoapException
     */
    public function getClientesNumero(GetClientesNumero $parameters): GetClientesNumeroResponse
    {
        return $this->call('GetClientesNumero', $parameters);
    }

    /**
     * @param RequestInterface|GetClientesNif $parameters
     * @return ResultInterface|GetClientesNifResponse
     * @throws SoapException
     */
    public function getClientesNif(GetClientesNif $parameters): GetClientesNifResponse
    {
        return $this->call('GetClientesNif', $parameters);
    }

    /**
     * @param RequestInterface|GetClientesMail $parameters
     * @return ResultInterface|GetClientesMailResponse
     * @throws SoapException
     */
    public function getClientesMail(GetClientesMail $parameters): GetClientesMailResponse
    {
        return $this->call('GetClientesMail', $parameters);
    }

    /**
     * @param RequestInterface|GetClientesTlf $parameters
     * @return ResultInterface|GetClientesTlfResponse
     * @throws SoapException
     */
    public function getClientesTlf(GetClientesTlf $parameters): GetClientesTlfResponse
    {
        return $this->call('GetClientesTlf', $parameters);
    }

    /**
     * @param RequestInterface|GetAssSerie $parameters
     * @return ResultInterface|GetAssSerieResponse
     * @throws SoapException
     */
    public function getAssSerie(GetAssSerie $parameters): GetAssSerieResponse
    {
        return $this->call('GetAssSerie', $parameters);
    }

    /**
     * @param RequestInterface|GetArtigoRef $parameters
     * @return ResultInterface|GetArtigoRefResponse
     * @throws SoapException
     */
    public function getArtigoRef(GetArtigoRef $parameters): GetArtigoRefResponse
    {
        return $this->call('GetArtigoRef', $parameters);
    }

    /**
     * @param RequestInterface|GetArtigoCod $parameters
     * @return ResultInterface|GetArtigoCodResponse
     * @throws SoapException
     */
    public function getArtigoCod(GetArtigoCod $parameters): GetArtigoCodResponse
    {
        return $this->call('GetArtigoCod', $parameters);
    }

    /**
     * @param RequestInterface|GetArtigoFamSfa $parameters
     * @return ResultInterface|GetArtigoFamSfaResponse
     * @throws SoapException
     */
    public function getArtigoFamSfa(GetArtigoFamSfa $parameters): GetArtigoFamSfaResponse
    {
        return $this->call('GetArtigoFamSfa', $parameters);
    }

    /**
     * @param RequestInterface|GetArtigoMarca $parameters
     * @return ResultInterface|GetArtigoMarcaResponse
     * @throws SoapException
     */
    public function getArtigoMarca(GetArtigoMarca $parameters): GetArtigoMarcaResponse
    {
        return $this->call('GetArtigoMarca', $parameters);
    }

    /**
     * @param RequestInterface|GetFamilias $parameters
     * @return ResultInterface|GetFamiliasResponse
     * @throws SoapException
     */
    public function getFamilias(GetFamilias $parameters): GetFamiliasResponse
    {
        return $this->call('GetFamilias', $parameters);
    }

    /**
     * @param RequestInterface|GetSubFamilias $parameters
     * @return ResultInterface|GetSubFamiliasResponse
     * @throws SoapException
     */
    public function getSubFamilias(GetSubFamilias $parameters): GetSubFamiliasResponse
    {
        return $this->call('GetSubFamilias', $parameters);
    }

    /**
     * @param RequestInterface|GetSeccoes $parameters
     * @return ResultInterface|GetSeccoesResponse
     * @throws SoapException
     */
    public function getSeccoes(GetSeccoes $parameters): GetSeccoesResponse
    {
        return $this->call('GetSeccoes', $parameters);
    }

    /**
     * @param RequestInterface|GetMarcas $parameters
     * @return ResultInterface|GetMarcasResponse
     * @throws SoapException
     */
    public function getMarcas(GetMarcas $parameters): GetMarcasResponse
    {
        return $this->call('GetMarcas', $parameters);
    }

    /**
     * @param RequestInterface|GetMotivosIsento $parameters
     * @return ResultInterface|GetMotivosIsentoResponse
     * @throws SoapException
     */
    public function getMotivosIsento(GetMotivosIsento $parameters): GetMotivosIsentoResponse
    {
        return $this->call('GetMotivosIsento', $parameters);
    }

    /**
     * @param RequestInterface|GetMotivosCredito $parameters
     * @return ResultInterface|GetMotivosCreditoResponse
     * @throws SoapException
     */
    public function getMotivosCredito(GetMotivosCredito $parameters): GetMotivosCreditoResponse
    {
        return $this->call('GetMotivosCredito', $parameters);
    }

    /**
     * @param RequestInterface|GetCondPag $parameters
     * @return ResultInterface|GetCondPagResponse
     * @throws SoapException
     */
    public function getCondPag(GetCondPag $parameters): GetCondPagResponse
    {
        return $this->call('GetCondPag', $parameters);
    }

    /**
     * @param RequestInterface|GetMaterias $parameters
     * @return ResultInterface|GetMateriasResponse
     * @throws SoapException
     */
    public function getMaterias(GetMaterias $parameters): GetMateriasResponse
    {
        return $this->call('GetMaterias', $parameters);
    }

    /**
     * @param RequestInterface|GetToques $parameters
     * @return ResultInterface|GetToquesResponse
     * @throws SoapException
     */
    public function getToques(GetToques $parameters): GetToquesResponse
    {
        return $this->call('GetToques', $parameters);
    }

    /**
     * @param RequestInterface|GetModPag $parameters
     * @return ResultInterface|GetModPagResponse
     * @throws SoapException
     */
    public function getModPag(GetModPag $parameters): GetModPagResponse
    {
        return $this->call('GetModPag', $parameters);
    }

    /**
     * @param RequestInterface|GetDocVnd $parameters
     * @return ResultInterface|GetDocVndResponse
     * @throws SoapException
     */
    public function getDocVnd(GetDocVnd $parameters): GetDocVndResponse
    {
        return $this->call('GetDocVnd', $parameters);
    }

    /**
     * @param RequestInterface|GetVendedores $parameters
     * @return ResultInterface|GetVendedoresResponse
     * @throws SoapException
     */
    public function getVendedores(GetVendedores $parameters): GetVendedoresResponse
    {
        return $this->call('GetVendedores', $parameters);
    }

    /**
     * @param RequestInterface|GetArtigos $parameters
     * @return ResultInterface|GetArtigosResponse
     * @throws SoapException
     */
    public function getArtigos(GetArtigos $parameters): GetArtigosResponse
    {
        return $this->call('GetArtigos', $parameters);
    }

    /**
     * @param RequestInterface|EditCliente $parameters
     * @return ResultInterface|EditClienteResponse
     * @throws SoapException
     */
    public function editCliente(EditCliente $parameters): EditClienteResponse
    {
        return $this->call('EditCliente', $parameters);
    }

    /**
     * @param RequestInterface|EditFornecedor $parameters
     * @return ResultInterface|EditFornecedorResponse
     * @throws SoapException
     */
    public function editFornecedor(EditFornecedor $parameters): EditFornecedorResponse
    {
        return $this->call('EditFornecedor', $parameters);
    }

    /**
     * @param RequestInterface|EditOutro $parameters
     * @return ResultInterface|EditOutroResponse
     * @throws SoapException
     */
    public function editOutro(EditOutro $parameters): EditOutroResponse
    {
        return $this->call('EditOutro', $parameters);
    }

    /**
     * @param RequestInterface|EditFamilia $parameters
     * @return ResultInterface|EditFamiliaResponse
     * @throws SoapException
     */
    public function editFamilia(EditFamilia $parameters): EditFamiliaResponse
    {
        return $this->call('EditFamilia', $parameters);
    }

    /**
     * @param RequestInterface|EditSubFamilia $parameters
     * @return ResultInterface|EditSubFamiliaResponse
     * @throws SoapException
     */
    public function editSubFamilia(EditSubFamilia $parameters): EditSubFamiliaResponse
    {
        return $this->call('EditSubFamilia', $parameters);
    }

    /**
     * @param RequestInterface|EditVendedor $parameters
     * @return ResultInterface|EditVendedorResponse
     * @throws SoapException
     */
    public function editVendedor(EditVendedor $parameters): EditVendedorResponse
    {
        return $this->call('EditVendedor', $parameters);
    }

    /**
     * @param RequestInterface|EditMarca $parameters
     * @return ResultInterface|EditMarcaResponse
     * @throws SoapException
     */
    public function editMarca(EditMarca $parameters): EditMarcaResponse
    {
        return $this->call('EditMarca', $parameters);
    }

    /**
     * @param RequestInterface|EditArtigo $parameters
     * @return ResultInterface|EditArtigoResponse
     * @throws SoapException
     */
    public function editArtigo(EditArtigo $parameters): EditArtigoResponse
    {
        return $this->call('EditArtigo', $parameters);
    }

    /**
     * @param RequestInterface|InsertInvoice $parameters
     * @return ResultInterface|InsertInvoiceResponse
     * @throws SoapException
     */
    public function insertInvoice(InsertInvoice $parameters): InsertInvoiceResponse
    {
        return $this->call('InsertInvoice', $parameters);
    }

    /**
     * @param RequestInterface|InsertInvoiceLine $parameters
     * @return ResultInterface|InsertInvoiceLineResponse
     * @throws SoapException
     */
    public function insertInvoiceLine(InsertInvoiceLine $parameters): InsertInvoiceLineResponse
    {
        return $this->call('InsertInvoiceLine', $parameters);
    }

    /**
     * @param RequestInterface|CloseInvoice $parameters
     * @return ResultInterface|CloseInvoiceResponse
     * @throws SoapException
     */
    public function closeInvoice(CloseInvoice $parameters): CloseInvoiceResponse
    {
        return $this->call('CloseInvoice', $parameters);
    }

    /**
     * @param RequestInterface|InvoiceMotivoIsento $parameters
     * @return ResultInterface|InvoiceMotivoIsentoResponse
     * @throws SoapException
     */
    public function invoiceMotivoIsento(InvoiceMotivoIsento $parameters): InvoiceMotivoIsentoResponse
    {
        return $this->call('InvoiceMotivoIsento', $parameters);
    }

    /**
     * @param RequestInterface|InvoiceMotivoCredito $parameters
     * @return ResultInterface|InvoiceMotivoCreditoResponse
     * @throws SoapException
     */
    public function invoiceMotivoCredito(InvoiceMotivoCredito $parameters): InvoiceMotivoCreditoResponse
    {
        return $this->call('InvoiceMotivoCredito', $parameters);
    }

    /**
     * @param RequestInterface|DeleteInvoice $parameters
     * @return ResultInterface|DeleteInvoiceResponse
     * @throws SoapException
     */
    public function deleteInvoice(DeleteInvoice $parameters): DeleteInvoiceResponse
    {
        return $this->call('DeleteInvoice', $parameters);
    }

    /**
     * @param RequestInterface|PayInvoice $parameters
     * @return ResultInterface|PayInvoiceResponse
     * @throws SoapException
     */
    public function payInvoice(PayInvoice $parameters): PayInvoiceResponse
    {
        return $this->call('PayInvoice', $parameters);
    }

    /**
     * @param RequestInterface|InvoicePdf $parameters
     * @return ResultInterface|InvoicePdfResponse
     * @throws SoapException
     */
    public function invoicePdf(InvoicePdf $parameters): InvoicePdfResponse
    {
        return $this->call('InvoicePdf', $parameters);
    }

    /**
     * @param RequestInterface|ReceiptPdf $parameters
     * @return ResultInterface|ReceiptPdfResponse
     * @throws SoapException
     */
    public function receiptPdf(ReceiptPdf $parameters): ReceiptPdfResponse
    {
        return $this->call('ReceiptPdf', $parameters);
    }


}

