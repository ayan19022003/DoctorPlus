$(document).ready(function () {
    $('#login-form').submit(function () { 
       var p = $('#ph');
       var pw = $('#pwd');
       var pe = $('#phe');
       var pwe = $('#pwde');
       var did = $('#did');
       var dide = $('#dide');
       var valp = p.val();
       var firstDigit = valp.charAt(0);
       var validFirstDigits = ['9', '8', '7','6'];
        if (p.val().length != 10) {
            pe.css('visibility','visible');
            p.css('borderColor','#cf0c26');
            return false;
        }
        else if (!(validFirstDigits.includes(firstDigit))) {
            pe.css('visibility','visible');
            p.css('borderColor','#cf0c26');
            return false;
        }
        if (did.val() == "") {
            dide.css('visibility','visible');
            did.css('borderColor','#cf0c26');
            return false;
        }
        if (pw.val() == "") {
            pwe.css('visibility','visible');
            pw.css('borderColor','#cf0c26');
            return false;
        }
    });
    $('#doclogin-form').submit(function () { 
        var pw = $('#pwd');
        var pwe = $('#pwde');
        var did = $('#did');
        var dide = $('#dide');
         if (did.val() == "") {
             dide.css('visibility','visible');
             did.css('borderColor','#cf0c26');
             return false;
         }
         if (pw.val() == "") {
             pwe.css('visibility','visible');
             pw.css('borderColor','#cf0c26');
             return false;
         }
     });
    $('#signup-form').submit(function () { 
        var p = $('#ph');
        var pw = $('#pwd');
        var n = $('#n');
        var age = $('#age');
        var wei = $('#wei');
        var add = $('#add');
        var gen = $('#gen');
        var dedu = $('#dedu');
        var dept = $('#dept');
        var dedue = $('#dedue');
        var pe = $('#phe');
        var pwe = $('#pwde');
        var ne = $('#ne');
        var agee = $('#agee');
        var weie = $('#weie');
        var adde = $('#adde');
        var gene = $('#gene');
        var depte = $('#depte');
        var valp = p.val();
        var firstDigit = valp.charAt(0);
        var validFirstDigits = ['9', '8', '7','6'];
        if (n.val() == "") {
            ne.css('visibility','visible');
            n.css('borderColor','#cf0c26');
            return false;
        }
        if (dept.val() == "") {
            depte.css('visibility','visible');
            dept.css('borderColor','#cf0c26');
            return false;
        }
         if (p.val().length != 10) {
             pe.css('visibility','visible');
             p.css('borderColor','#cf0c26');
             return false;
         }
         else if (!(validFirstDigits.includes(firstDigit))) {
            pe.css('visibility','visible');
            p.css('borderColor','#cf0c26');
            return false;
        }
         if (pw.val() == "") {
             pwe.css('visibility','visible');
             pw.css('borderColor','#cf0c26');
             return false;
         }
         if (gen.val() == "select") {
            gene.css('visibility','visible');
            gen.css('borderColor','#cf0c26');
            return false;
        }
        if (age.val() == "") {
            agee.css('visibility','visible');
            age.css('borderColor','#cf0c26');
            return false;
        }
        if (wei.val() == "") {
            weie.css('visibility','visible');
            wei.css('borderColor','#cf0c26');
            return false;
        }
        if (add.val() == "") {
            adde.css('visibility','visible');
            add.css('borderColor','#cf0c26');
            return false;
        }
        if (dedu.val() == "") {
            dedue.css('visibility','visible');
            dedu.css('borderColor','#cf0c26');
            return false;
        }
        if (dept.val() == "") {
            depte.css('visibility','visible');
            dept.css('borderColor','#cf0c26');
            return false;
        }
     });
    //  $('#update-form').submit(function () { 
    //     var p = $('#ph');
    //     var pw = $('#opwd');
    //     var npw = $('#npwd');
    //     var n = $('#n');
    //     var age = $('#age');
    //     var wei = $('#wei');
    //     var add = $('#add');
    //     var gen = $('#gen');
    //     var pe = $('#phe');
    //     var pwe = $('#opwde');
    //     var npwe = $('#npwde');
    //     var ne = $('#ne');
    //     var agee = $('#agee');
    //     var weie = $('#weie');
    //     var adde = $('#adde');
    //     var gene = $('#gene');
    //     if (n.val() == "") {
    //         ne.css('visibility','visible');
    //         n.css('borderColor','#cf0c26');
    //         return false;
    //     }
    //      if (p.val().length != 10) {
    //          pe.css('visibility','visible');
    //          p.css('borderColor','#cf0c26');
    //          return false;
    //      }
    //      if (pw.val() == "") {
    //          pwe.css('visibility','visible');
    //          pw.css('borderColor','#cf0c26');
    //          return false;
    //      }
    //      if (npw.val() == "") {
    //         npwe.css('visibility','visible');
    //         npw.css('borderColor','#cf0c26');
    //         return false;
    //     }
    //      if (gen.val() == "select") {
    //         gene.css('visibility','visible');
    //         gen.css('borderColor','#cf0c26');
    //         return false;
    //     }
    //     if (age.val() == "") {
    //         agee.css('visibility','visible');
    //         age.css('borderColor','#cf0c26');
    //         return false;
    //     }
    //     if (wei.val() == "") {
    //         weie.css('visibility','visible');
    //         wei.css('borderColor','#cf0c26');
    //         return false;
    //     }
    //     if (add == "") {
    //         adde.css('visibility','visible');
    //         add.css('borderColor','#cf0c26');
    //         return false;
    //     }
    //  });
     $('#pass-form').submit(function () { 
        var pw = $('#opwd');
        var npw = $('#npwd');
        var pwe = $('#opwde');
        var npwe = $('#npwde');
         if (pw.val() == "") {
             pwe.css('visibility','visible');
             pw.css('borderColor','#cf0c26');
             return false;
         }
         if (npw.val() == "") {
            npwe.css('visibility','visible');
            npw.css('borderColor','#cf0c26');
            return false;
        }
     });
     $('#query-form').submit(function () { 
        var sy = $('#sy');
        var dm = $('#dm');
        var sye = $('#sye');
        var dme = $('#dme');
         if (sy.val() == "") {
             sye.css('visibility','visible');
             sy.css('borderColor','#cf0c26');
             return false;
         }
         if (dm.val() == "") {
            dme.css('visibility','visible');
            dm.css('borderColor','#cf0c26');
            return false;
        }
     });
     $('#sche-form').submit(function () { 
        var start = $('#n');
        var end = $('#pwd');
        var date = $('#age');
        var ste = $('#ne');
        var ene = $('#pwde');
        var de = $('#agee');
        var today = new Date().toLocaleDateString('en-IN');
        var idate = new Date(date.val());
        var tdate = idate.toLocaleDateString('en-IN');
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var timeString = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0');
        var etime = end.val().toString();
        var stime = start.val().toString();
        var startDate = new Date('1970/01/01 ' + start.val());
        var endDate = new Date('1970/01/01 ' + end.val());
        var timeDiffMinutes = (endDate.getTime() - startDate.getTime()) / (1000 * 60);
        if (start.val() == "") {
            ste.css('visibility','visible');
            start.css('borderColor','#cf0c26');
            return false;
        }
        if (end.val() == "") {
            ene.css('visibility','visible');
            end.css('borderColor','#cf0c26');
            return false;
        }
        if (date.val() == "") {
            de.css('visibility','visible');
            date.css('borderColor','#cf0c26');
            return false;
        }
        if (tdate < today) {
            de.html('The date is expired');
            de.css('visibility','visible');
            date.css('borderColor','#cf0c26');
            return false;
          }
        if (tdate == today) {
            if ( timeString > etime) {
            ene.html('The Time is expired');
            ene.css('visibility','visible');
            end.css('borderColor','#cf0c26');
            return false;
            }
        }
        if (stime > etime ) {
            ene.html('End time must be grater than Start Time');
            ene.css('visibility','visible');
            end.css('borderColor','#cf0c26');
            return false;
        }
        else if (timeDiffMinutes < 30 ) {
            ene.html('The session will must be greater than 30min');
            ene.css('visibility','visible');
            end.css('borderColor','#cf0c26');
            return false;
        }
       });
    $('#ph').keyup(function () { 
        $('#phe').css('visibility','hidden');
        $('#ph').css('borderColor','#02a325');
    });
    $('#pwd').keyup(function () { 
        $('#pwde').css('visibility','hidden');
        $('#pwd').css('borderColor','#02a325');
    });
    $('#opwd').keyup(function () { 
        $('#opwde').css('visibility','hidden');
        $('#opwd').css('borderColor','#02a325');
    });
    $('#npwd').keyup(function () { 
        $('#npwde').css('visibility','hidden');
        $('#npwd').css('borderColor','#02a325');
    });
    $('#n').keyup(function () { 
        $('#ne').css('visibility','hidden');
        $('#n').css('borderColor','#02a325');
    });
    $('#age').keyup(function () { 
        $('#agee').css('visibility','hidden');
        $('#age').css('borderColor','#02a325');
    });
    $('#wei').keyup(function () { 
        $('#weie').css('visibility','hidden');
        $('#wei').css('borderColor','#02a325');
    });
    $('#add').keyup(function () { 
        $('#adde').css('visibility','hidden');
        $('#add').css('borderColor','#02a325');
    });
    $('#gen').change(function () { 
        $('#gene').css('visibility','hidden');
        $('#gen').css('borderColor','#02a325');
    });
    $('#did').keyup(function () { 
        $('#dide').css('visibility','hidden');
        $('#did').css('borderColor','#02a325');
    });
    $('#sy').keyup(function () { 
        $('#sye').css('visibility','hidden');
        $('#sy').css('borderColor','#02a325');
    });
    $('#dm').keyup(function () { 
        $('#dme').css('visibility','hidden');
        $('#dm').css('borderColor','#02a325');
    });
    $('#dept').keyup(function () { 
        $('#depte').css('visibility','hidden');
        $('#dept').css('borderColor','#02a325');
    });
    $('#dedu').keyup(function () { 
        $('#dedue').css('visibility','hidden');
        $('#dedu').css('borderColor','#02a325');
    });
});