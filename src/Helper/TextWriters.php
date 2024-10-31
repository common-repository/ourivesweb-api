<?php

namespace OurivesWeb\Helper;


class TextWriters
{

    public function __construct()
    {
        return $this;
    }

    public static function WriteOurivesWeb($File_name, $index, $name, $ourivesweb_index)
    {
        Log::phpWrite($File_name, '
                <tr style="background-color:#a6a6a6;">
                <th scope="row" >' . $index . '</th>
                <td>' . $name . '</td>
                <td><span style="color:Red">&#10006</span></td>
                <td><span>&#10004;</span></td>');
        return ++$ourivesweb_index;
    }

    public static function WriteWC($File_name, $index, $name, $WC_index)
    {
        Log::phpWrite($File_name, '
        <tr style="background-color: #00ff3343;">
        <th scope="row" >' . $index . '</th>
        <td>' . $name . '</td>
        <td><span>&#10004;</span></td>
        <td><span style="color:Red">&#10006</span></td>
        ');
        return ++$WC_index;
    }

    public static function NoNeeed($File_name, $index, $name, $No_Need_index)
    {
        Log::phpWrite($File_name, '
        <tr>
        <th scope="row" >' . $index . '</th>
        <td>' . $name . '</td>
        <td><span style="color:Red">&#8212;</span></td>
        <td><span style="color:Red">&#8212;</span></td>');
        return ++$No_Need_index;
    }

    public static function Error($File_name, $index, $name, $error, $error_index)
    {
        Log::phpWrite($File_name, '
            <tr style="background-color: #ff000088;">
            <th scope="row" >' . $index . '</th>
            <td>' . $name . '</td>
            <td><span style="color:Red">&#10006</span></td>
            <td><span style="color:Red">&#10006</span></td>');
        Log::write('Erro: ' . $error . '');
        return ++$error_index;
    }

    public static function Finish($File_name, $WC_index, $ourivesweb_index, $No_Need_index, $inativo, $error_index, $tempo)
    {
        Log::phpWrite($File_name, '
            <tr style="background-color: #f2ff0043;">
                <th scope="row" >Debug</th>
                <td>Contador de artigos inseridos no WC</td>
                <td>WC</td>
                <td>' . $WC_index . '</td>
            </tr>
            <tr style="background-color: #f2ff0043;">
                <th scope="row" >Debug</th>
                <td>Contador de artigos inseridos no OurivesWeb</td>
                <td>OurivesWeb</td>
                <td>' . $ourivesweb_index . '</td>
            </tr>
            <tr style="background-color: #f2ff0043;">
                <th scope="row" >Debug</th>
                <td>Contador de artigos sem necessidade de alteração</td>
                <td>No Need</td>
                <td>' . $No_Need_index . '</td>
            </tr>
            <tr style="background-color: #f2ff0043;">
                <th scope="row" >Debug</th>
                <td>Erro</td>
                <td>Erro</td>
                <td>' . $error_index . '</td>
            </tr>
            <tr style="background-color: #f2ff0043;">
            <th scope="row" >Debug</th>
            <td>Inativo</td>
            <td>Inativo</td>
            <td>' . $inativo . '</td>
        </tr>
                <tr style="background-color: #f2ff0043;">
                <th scope="row" >Debug</th>
                <td>Tempo Total de execução</td>
                <td>Tempo</td>
                <td>' . (time() - $tempo) . '</td>
            </tr>
             </tbody>
             </table>');
        Log::write('Finish Update_ourivesweb_ToWC ');
    }
}
