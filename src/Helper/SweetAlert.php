<?php

namespace OurivesWeb\Helper;


class SweetAlert
{
    public static function AnimatedNotify_Simple($typ, $Mesg)
    {
        wp_enqueue_script('SweetAlert.all.min.js', plugins_url('assets\Includes\sweetalert2.all.min.js', OURIVES_FILE));
        wp_add_inline_script('SweetAlert.all.min.js', "
            Swal.fire({
                position: 'center',
                icon: '$typ',
                title: '$Mesg',
                showConfirmButton: false,
                timer: 2000
            })");
    }

    public static function Button_Click($typ, $Mesg)
    {
        wp_enqueue_script('SweetAlert.all.min.js', plugins_url('assets\Includes\sweetalert2.all.min.js', OURIVES_FILE));
        wp_add_inline_script('SweetAlert.all.min.js', "
            Swal.fire({
                position: 'center',
                icon: '$typ',
                title: '$Mesg',
                showConfirmButton: true
            })");
    }

    public static function AnimatedNotify($typ, $Mesg)
    {
        wp_enqueue_script('SweetAlert.all.min.js', plugins_url('assets\Includes\sweetalert2.all.min.js', OURIVES_FILE));
        wp_add_inline_script('SweetAlert.all.min.js', "
                const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })
                Toast.fire({
                icon: '" . $typ . "',
                title: '" . $Mesg . "'
                })");

    }

    public static function AnimatedNotifyPDF($typ, $Mesg, $Link)
    {

        wp_enqueue_script('SweetAlert.all.min.js', plugins_url('assets\Includes\sweetalert2.all.min.js', OURIVES_FILE));
        wp_add_inline_script('SweetAlert.all.min.js', "
        Swal.fire({
            icon:  '" . $typ . "',
            title: '" . $Mesg . "',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: `Abrir Documento`,
            denyButtonText: `Guardar Documento`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                    Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Documento Aberto',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    var win = window.open('" . $Link . "', '_blank');
                    win.focus();
            } else if (result.isDenied) {
                SaveToDisk('" . $Link . "', 'tmp35EAtmp.pdf');
                Swal.fire('Changes are not saved', '', 'info')
            }
            })");
    }


}

