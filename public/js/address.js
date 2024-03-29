$(document).ready(function() {
    function e() {
        var e = $(this),
            i = e.closest(".row"),
            n = $.ajax({
                url: o,
                dataType: "JSON",
                data: {
                    state_id: e.val()
                },
                beforeSend: function(e) {
                    return e.setRequestHeader("X-CSRF-Token", d)
                }
            }),
            t = i.find(".city");
        t.find("option").remove(), t.prop("disabled", !0), t.append($("<option>", {
            value: "",
            text: "Selecione"
        })), t.val("").trigger("change"), n.done(function(e) {
            if (e && e.success && e.cities) {
                for (var i = "", n = 0; n < e.cities.length; n++) i += '<option value="' + e.cities[n].id + '">' + e.cities[n].name + "</option>";
                if (t.append(i), t.prop("disabled", !1), a) {
                    var d = 'option:contains("' + a + '")';
                    t.find(d).prop("selected", !0).change()
                }
            }
        })
    }

    function i() {
        var e = $(this),
            i = e.closest(".row");
        "condominium" == e.val() || "1" == e.val() ? (i.find(".cond-required").val(""), i.find(".div-address-cond").show(300), i.find(".cond-required").prop("required", !0)) : (i.find(".cond-required").val(""), i.find(".div-address-cond").hide(300), i.find(".cond-required").prop("required", !1))
    }

    function n() {
        var e = $(this),
            i = e.val().replace("-", ""),
            n = e.closest(".row");
        8 == i.length && (a = "", $.getJSON("//viacep.com.br/ws/" + i + "/json/?callback=?", function(e) {
            if ("erro" in e) n.find(".state").val("").trigger("change"), n.find(".street").val(""), n.find(".district").val(""), n.find(".number").val(""), n.find(".comp").val(""), n.find(".comp").val(""), n.find(".info").val("");
            else if (e.uf) {
                a = e.localidade;
                var i = ".state option:contains('" + e.uf + "')";
                n.find(i).prop("selected", !0).trigger("change"), n.find(".street").val(e.logradouro), n.find(".district").val(e.bairro), n.find(".number").val(""), n.find(".comp").val(""), n.find(".info").val("")
            }
        }))
    }

    function t() {
        var e = $(this);
        "pj" == r && "4892" == e.val() && e.closest(".row-address").parent() ? $("#im").prop("required", !0).prev().html('Inscrição Municipal<span style="color: red;"><sup>&bull;</sup></span>') : $("#im").prop("required", !1).prev().text("Inscrição Municipal")
    }
    var a = "",
        d = $("input[name='_token']").val(),
        o = $("#route-city-state").val(),
        r = "";
    $(".zipcode").mask("00000-000"), $(document).delegate(".state", "change", e), $(document).delegate(".select_cond", "change", i), $(document).delegate(".zipcode", "input", n), $(document).delegate(".city", "change", t)
});
