$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function frmLogin(e) {
    var user = document.getElementById("user");
    var pass = document.getElementById("password");
    if (user.value == "") {
        pass.classList.remove("is-invalid");
        user.classList.add("is-invalid");
        user.focus();
    } else if (pass.value == "") {
        user.classList.remove("is-invalid");
        pass.classList.add("is-invalid");
        pass.focus();
    }

    let form = $(e).closest("form");
    $.ajax({
        url: form.prop("action"),
        data: form.serialize(),
        method: "POST",
        datatype: "json",
        success: function (response) {
            if (response.status == "ERROR") {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Usuario o Contraseña Incorrecto',
                    showConfirmButton: false,
                    timer: 3000
                })
            }
            else {
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Bienvenido Usuario',
                    showConfirmButton: false,
                    timer: 3000
                })
                location.href = 'Bienvenido';
            }
        },
        error: function (response) {
            //console.log(response)
        }

    })
}

function regUser() {
    $.ajax({
        url: "/user/new",
        data: {},
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);

            $("#formuser").html($(response.html).find("#FrmEditUser"))
        },
        error: function (response) {
            console.log(response);
        }
    })
}
function regPeople() {
    $.ajax({
        url: "/people/new",
        data: {},
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);

            $("#formpeople").html($(response.html).find("#frmEditPeople"))
        },
        error: function (response) {
            console.log(response);
        }
    })
}
function regClient() {
    $.ajax({
        url: "/client/new",
        data: {},
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);

            $("#formclient").html($(response.html).find("#FrmEditClient"))
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function regCompany() {
    $.ajax({
        url: "/company/new",
        data: {},
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);

            $("#formcompany").html($(response.html).find("#frmEditEmpresa"))
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function regOffice() {
    $.ajax({
        url: "/office/new",
        data: {},
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);

            $("#formoffice").html($(response.html).find("#FrmEditoffice"))
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function regProveedor() {
    $.ajax({
        url: "/proveedor/new",
        data: {},
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);

            $("#formproveedor").html($(response.html).find("#frmEditProveedor"))
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function regInventario() {
    $.ajax({
        url: "/inventario/new",
        data: {},
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);

            $("#forminventario").html($(response.html).find("#FrmEditInventario"))
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function saveUser(e) {
    let form = $(e).closest("form");
    $.ajax({
        url: form.prop("action"),
        data: form.serialize(),
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            Swal.fire({
                position: 'top-center',
                icon: response.status,
                title: response.message,
                showConfirmButton: false,
                timer: 3000
            })
        },
        error: function (response) {
            console.log(response);
        }
    })

}

function savePeople(e) {
    let form = $(e).closest("form");
    $.ajax({
        url: form.prop("action"),
        data: form.serialize(),
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            Swal.fire({
                position: 'top-center',
                icon: response.status,
                title: response.message,
                showConfirmButton: false,
                timer: 3000
            })
        },
        error: function (response) {
            console.log(response);
        }
    })

}

function saveClient(e) {
    let form = $(e).closest("form");
    $.ajax({
        url: form.prop("action"),
        data: form.serialize(),
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            Swal.fire({
                position: 'top-center',
                icon: response.status,
                title: response.message,
                showConfirmButton: false,
                timer: 3000
            })
        },
        error: function (response) {
            console.log(response);
        }
    })

}

function saveCompany(e) {
    let form = $(e).closest("form");
    $.ajax({
        url: form.prop("action"),
        data: form.serialize(),
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            Swal.fire({
                position: 'top-center',
                icon: response.status,
                title: response.message,
                showConfirmButton: false,
                timer: 3000
            })
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function saveOffice(e) {
    let form = $(e).closest("form");
    $.ajax({
        url: form.prop("action"),
        data: form.serialize(),
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            Swal.fire({
                position: 'top-center',
                icon: response.status,
                title: response.message,
                showConfirmButton: false,
                timer: 3000
            })
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function saveProveedor(e) {
    let form = $(e).closest("form");
    $.ajax({
        url: form.prop("action"),
        data: form.serialize(),
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            Swal.fire({
                position: 'top-center',
                icon: response.status,
                title: response.message,
                showConfirmButton: false,
                timer: 3000
            })
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function saveInventario(e) {
    let form = $(e).closest("form");
    $.ajax({
        url: form.prop("action"),
        data: form.serialize(),
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            Swal.fire({
                position: 'top-center',
                icon: response.status,
                title: response.message,
                showConfirmButton: false,
                timer: 3000
            })
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function modalDelete(id_user, is_active) {
    $("#actionstatus").text(is_active == 1 ? "Inhabilitar" : "Habilitar");
    $("#id_user").val(id_user);

}

function deleteUser(type) {
    var id = $("#id_user").val();

    $.ajax({
        url: "/user/delete",
        data: { id_user: id, type: type },
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            Swal.fire({
                position: 'top-center',
                icon: response.status,
                title: response.message,
                showConfirmButton: false,
                timer: 3000
            })
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function modalDeletePeople(id_people) {

    $("#id_people").val(id_people);

}
function deletePeople() {
    var id = $("#id_people").val();

    $.ajax({
        url: "/people/delete",
        data: { id_people: id },
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            if (response.status == "ERROR") {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Persona no Eliminado',
                    showConfirmButton: false,
                    timer: 3000
                })
            }
            else {
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Persona Eliminado con Éxito',
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function modalDeleteClient(id_client) {

    $("#id_client").val(id_client);

}
function deleteClient() {
    var id = $("#id_client").val();

    $.ajax({
        url: "/client/delete",
        data: { id_client: id },
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            if (response.status == "ERROR") {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Persona no Eliminado',
                    showConfirmButton: false,
                    timer: 3000
                })
            }
            else {
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Persona Eliminado con Éxito',
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function modalDeleteCompany(id_company) {

    $("#id_company").val(id_company);

}
function deleteCompany() {
    var id = $("#id_company").val();

    $.ajax({
        url: "/company/delete",
        data: { id_company: id },
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            if (response.status == "ERROR") {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Empresa no Eliminado',
                    showConfirmButton: false,
                    timer: 3000
                })
            }
            else {
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Empresa Eliminado con Éxito',
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function modalDeleteOffice(id_office) {

    $("#id_office").val(id_office);

}
function deleteOffice() {
    var id = $("#id_office").val();

    $.ajax({
        url: "/office/delete",
        data: { id_office: id },
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            if (response.status == "ERROR") {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Oficina no Eliminado',
                    showConfirmButton: false,
                    timer: 3000
                })
            }
            else {
                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Oficina Eliminado con Éxito',
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function modalDeleteProveedor(id_proveedor, is_active) {

    $("#actionstatus").text(is_active == 1 ? "Inhabilitar" : "Habilitar");
    $("#id_proveedor").val(id_proveedor);

}
function deleteProveedor(type) {
    var id = $("#id_proveedor").val();

    $.ajax({
        url: "/proveedor/delete",
        data: { id_proveedor: id, type: type },
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            Swal.fire({
                position: 'top-center',
                icon: response.status,
                title: response.message,
                showConfirmButton: false,
                timer: 3000
            })
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function modalDeleteInventario(id_inventario) {

    $("#id_inventario").val(id_inventario);

}
function deleteInventario() {
    var id = $("#id_inventario").val();

    $.ajax({
        url: "/inventario/delete",
        data: { id_inventario: id},
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            Swal.fire({
                position: 'top-center',
                icon: response.status,
                title: response.message,
                showConfirmButton: false,
                timer: 3000
            })
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function Salida() {
    var id = $("#id_inventario").val();

    $.ajax({
        url: "/inventario/Salida",
        data: { id_inventario: id},
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            Swal.fire({
                position: 'top-center',
                icon: response.status,
                title: response.message,
                showConfirmButton: false,
                timer: 3000
            })
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function savePerfil(e) {
    let form = $(e).closest("form");
    $.ajax({
        url: form.prop("action"),
        data: form.serialize(),
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            Swal.fire({
                position: 'top-center',
                icon: response.status,
                title: response.message,
                showConfirmButton: false,
                timer: 3000
            })
        },
        error: function (response) {
            console.log(response);
        }
    })
}

function modalclosecaja(id_caja) {
    $.ajax({
        url: "/caja/monto",
        data: { id_caja: id_caja },
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            $("#message_close").html("Monto de ventas:" + response.total + "<br>Monto apertura:" + response.caja.monto_apertura + "<br>Total cierre: " + (parseFloat(response.caja.monto_apertura) + parseFloat(response.total)));
            $("#total_close").val((parseFloat(response.caja.monto_apertura) + parseFloat(response.total)));
            /*Swal.fire({
                position: 'top-center',
                icon: response.status,
                title: response.message,
                showConfirmButton: false,
                timer: 3000
            })*/
        },
        error: function (response) {
            console.log(response);
        }
    })
    $("#id_caja").val(id_caja);

}

function closecaja() {
    var id = $("#id_caja").val();
    var total_close = $("#total_close").val();

    $.ajax({
        url: "/caja/cerra",
        data: { id_caja: id, total_close: total_close},
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            if (response.status == "ERROR") {
                Swal.fire({
                    position: 'top-center',
                    icon: 'error',
                    title: 'Caja no Cerrada',
                    showConfirmButton: false,
                    timer: 3000
                })
            }
            else {

                Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Caja Cerrada con Éxito',
                    showConfirmButton: false,
                    timer: 3000
                });
                location.reload();
            }
        },
        error: function (response) {
            console.log(response);
        }
    })
}


function blockMaxMin() {
    $("input[type='number']").change(function () {
        var max = parseInt($(this).attr('max'));
        var min = parseInt($(this).attr('min'));
        if ($(this).val() > max) {
            $(this).val(max);
        }
        else if ($(this).val() < min) {
            $(this).val(min);
        }
    });
};


function searchProducts() {
    var name_product = $("#nameproduct").val();
    $.ajax({
        url: "/product/search",
        data: {
            "name_product": name_product
        },
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response);
            if (response.status == "SUCCESS") {
                var productos = response.productos;
                var tabla_prodcutos = $("tbody#productos");
                var html = "";
                for (var i in productos) {

                    var function_ = "addProduct('" + productos[i].id + "', '" + productos[i].precio_unitario + "', '" + productos[i].Article + "')";


                    html += '<tr id="venta_' + productos[i].id + '">' +
                        '<td>' + productos[i].Article + '</td>' +
                        '<td><input min="1" max="' + productos[i].cantidad + '" value="1" required="true" type="number"/></td>' +
                        '<td>' + productos[i].precio_unitario + '</td>' +
                        '<td><button type="button" onclick="' + function_ + '"><i class="fas fa-plus"></i></button></td>' +
                        '</tr>';

                }

                tabla_prodcutos.html(html);
                blockMaxMin();

            }

        },
        error: function (response) {
            console.log(response);
        }
    })
}

function addProduct(id_product, precio_unitario, nombre_producto) {
    var body = $("table#tblVentas>tbody");
    var tabla_productos = $("tbody#productos");
    var function_ = "delProduct(this)";
    var cantidad = 0;

    var input = tabla_productos.find("tr#venta_" + id_product + ">td:eq(1)>input");
    var cantidad = input.val();

    var tr = body.find("tr#" + id_product);
    console.log(tr.length);
    if (tr.length > 0) {
        tr.html('<td>' + nombre_producto + '</td>' +
            '<td name="cantidad">' + cantidad + '</td>' +
            '<td>' + precio_unitario + '</td>' +
            '<td name="price">' + (parseFloat(precio_unitario) * parseInt(cantidad)) + '</td>' +
            '<td><button type="button" onclick="' + function_ + '"><i class="fas fa-trash"></i></button></td>)');

    }
    else {
        body.append('<tr id="' + id_product + '">' +
            '<td>' + nombre_producto + '</td>' +
            '<td name="cantidad">' + cantidad + '</td>' +
            '<td>' + precio_unitario + '</td>' +
            '<td name="price">' + (parseFloat(precio_unitario) * parseInt(cantidad)) + '</td>' +
            '<td><button type="button" onclick="' + function_ + '"><i class="fas fa-trash"></i></button></td>' +
            '</tr>');


    }


    setTotalPrice();

}
function delProduct(element) {
    $(element).closest("tr").remove();
    setTotalPrice();

}

function setTotalPrice() {
    var body = $("table#tblVentas>tbody");
    var foot = $("table#tblVentas>tfoot>tr>th#preciototal");
    var $elements = body.find("td[name='price']");
    var total_precio = 0.00;
    $elements.each(function (i, element) {
        total_precio += parseFloat($(element).text());
    });
    foot.html(total_precio)
}

function saveSale() {
    var body = $("table#tblVentas>tbody");
    var products = [];
    var cantidad = 0;
    body.find("tr").each(function (i, element) {
        cantidad = $(element).find("td[name='cantidad']").first().text();
        id = $(element).prop("id");
        products.push({ "id": id, "cantidad": cantidad })
    });

    $.ajax({
        url: "/venta/guardar",
        data: { ventas: products },
        method: "POST",
        datatype: "json",
        success: function (response) {
            console.log(response)
            location.reload();

        },
        error: function (response) {
            console.log(response)

        }
    });

    console.log(products)

}