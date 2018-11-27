/* BRA-11384 Mise en place de la livraison en points relais */
function removeDeliveryAddresses(msg,adress) {
    if(confirm(msg)){
        jQuery.ajax({
            type: "GET",
            url: $(adress).data('href'),
            data:{"deliveryMode":$("input[name='deliveryMode']:checked").val()},
            success: function (data) {
                if (data != null) {
                    var addrBookContainer = $(data).find('.registrated-address.addrBookContainer');
                    var messages =$(data).find('#globalMessages');
                    $('.registrated-address.addrBookContainer').replaceWith(addrBookContainer);
                    $('#globalMessages').replaceWith(messages);
                }
                else {
                    console.log("error in removeDeliveryAddresses", data);
                }
            },
            error: function (data) {
                console.log("error in removeDeliveryAddresses", data);
            }
        });
    }
}

function setDefaultAddress(toUrl,addressId) {
    jQuery.ajax({
        type: "POST",
        url: toUrl,
        data: {"addressId":addressId},
        success: function (data) {
            if (data != null) {
                var messages =$(data).find('#globalMessages');
                var newForm=$(data).find("#formDeliveryMode");
                var oldPointRelaisDetails = $("#pointRelaisDetails");

                $('#formDeliveryMode').replaceWith(newForm);
                $('#globalMessages').replaceWith(messages);
                $('#pointRelaisDetails').replaceWith(oldPointRelaisDetails);
                jQuery("#pointRelaisDetails").show();
                showPagePoints();

                var addrEditAddressAnchor = $(data).find(".addEditAddressAnchor");
                var addrEditAddressFormContainer = $(data).find(".addEditAddressForm");
                $($(addrEditAddressFormContainer)).insertAfter($(newForm));
                $($(addrEditAddressAnchor)).insertAfter($(newForm));

                appendDeliveryAddress();
            }
            else {
                console.log("error in setDefaultAddress", data);
            }
        },
        error: function (data) {
            console.log("error in setDefaultAddress", data);
        }
    });
}


function initStandardDeliveryMode(thisObj){
    appendDeliveryAddress();
    validateDeliveryMode($(thisObj));
}

function initPointsRelaisDeliveryMode(thisObj){
    appendRelaisMap();
    validateDeliveryMode($(thisObj));
}
function appendRelaisMap(){
    var radioInput = $(".delivery-mode .form-horizontal").find("input[name='deliveryMode']:checked");
    var parent=$(radioInput).closest(".radiostyle");
    var relaisMap=$(".pRelaisDetails");
    $(parent).append($(relaisMap));
    $(relaisMap).show('slow');
    $(".customer-adress").hide();
    $(".registrated-address.addrBookContainer").hide();
    $("#AddressManager").hide();
    $("#hiddenDeliveryMode").val($(radioInput).val());
    initialiseRelaisMap(500);
}

function initialiseRelaisMap(timeOut){
    setTimeout(function() {
        initMap();
        showPagePoints();//#BRA-15010
    },timeOut);
};
function appendDeliveryAddress(){
    var radioInput = $(".delivery-mode .form-horizontal").find("input[name='deliveryMode']:checked");
    var parent=$(radioInput).closest(".radiostyle");
    if($(parent).hasClass("pointsRelais")){
        appendRelaisMap();
    }else{
        var divAdress=$(".customer-adress");
        $(parent).append($(divAdress));
        $(divAdress).show('slow');
        //append addEditAddressForm to selected standar delivery mode
        var addrEditAddressAnchor = $(".addEditAddressAnchor");
        var addrEditAddressFormContainer = $(".addEditAddressForm");
        $($(addrEditAddressFormContainer)).insertAfter($(parent));
        $($(addrEditAddressAnchor)).insertAfter($(parent));

        $(".registrated-address.addrBookContainer").hide();
        $(".pRelaisDetails").hide();
    }
    $("#hiddenDeliveryMode").val($(radioInput).val());
}
function appednAddrBookContainer(){
    var addrBookContainer = $(".registrated-address.addrBookContainer");
    var divAdress=$(".customer-adress");
    $($(addrBookContainer)).insertAfter($(divAdress));
    $(addrBookContainer).show('slow');
}

function searchPointrelais (event) {
    event.preventDefault();
    var rue=$("input[name='rue']").val();
    var codePostale=$("input[name='cp']").val();
    var ville=$("input[name='ville']").val();
    var deliveryMode=$("input[name='deliveryMode']").val();
    var urldest=$("#SearchPointrelais").data("href");
    if(codePostale && ville){
        jQuery.ajax({
            data: {"rue":rue,"cp":codePostale,"ville":ville,"deliveryMode":deliveryMode},
            url: urldest,
            success: function (html) {
                jQuery('#pointRelaisDetails').html(html).slideDown('slow', 'linear');
                $("input[name='rue']").val(rue);
                $("input[name='cp']").val(codePostale);
                $("input[name='ville']").val(ville)
                localStorage.setItem("ville",ville);
                localStorage.setItem("cp",codePostale);
                localStorage.setItem("rue",rue);
                localStorage.setItem("searchByDefault","false");
                $(".point-item").hide();
                $(".page-1").show();// afficher la 1ere page
                localStorage.setItem("currentPage",1);
                appendPagination();
                setTimeout(function() {
                    $('#pointRelaisMessages').fadeOut('fast');
                }, 5000);
            },
            error: function (html) {
                console.log("error in SearchPointrelais",html);
            }
        });
    }else{
        if(!codePostale){
            $(".erreCp").show();
        }
        if(!ville){
            $(".erreVille").show();
        }
        setTimeout(function() {
            $('.erreCp').fadeOut('fast');
            $('.erreVille').fadeOut('fast');
        }, 4000);
    }
};

function selectePointRetrait(event,identifiant) {
    event.preventDefault();
    var deliveryMode=$("input[name='deliveryMode']:checked").val();
    var urldest=$("#selectePointRetraitUrl").data("href");
    jQuery.ajax({
        data: {"identifiant":identifiant,"deliveryMode":deliveryMode},
        url: urldest,
        success: function (html) {
            var oldSearchResults = $('#pointRelaisDetails');
            jQuery('.pRelaisDetails').html(html).slideDown('slow', 'linear');
            $('#pointRelaisDetails').html(oldSearchResults);
            jQuery("#pointRelaisDetails").hide();
            $("#pointAcheminementDetail").show('slow');
            scrollToPointsRelais(500);
        },
        error: function (html) {
            console.log("error in selectePointRetrait",html);
        }
    });
};

function changePointRetrait(){
    if(localStorage.getItem("searchByDefault") === "true")
        searchPointsRelaisByDefault(true);
    $("#pointRelaisDetails").show('fast');
    $("#pointAcheminementDetail").remove();
    initialiseRelaisMap(500);
}

function scrollToPointsRelais(time){
    $('html, body').animate({
        scrollTop: $(".pointsRelais").offset().top-$("header").height()-10
    }, 500);
}

$(function(){
    appendDeliveryAddress();
})

/*BRA-11384  end */
