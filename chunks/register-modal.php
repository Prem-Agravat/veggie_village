<section class="registermodal">
<div id="modal2" class="modal" style="
    background: #ffffff; 
    border-radius: 12px; 
    padding: 25px; 
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
">
    <div class="modal-content center">
        <h4 style="color: #3E7B27; font-weight: bold; text-transform: uppercase; margin-bottom: 15px;">
            Register Here!
        </h4>

        <h5><small class="center" id="reg_error" style="color: #FF4C4C; font-weight: 600;"></small></h5>

        <form>
            <div class="row">
                <div class="input-field col s12">
                    <input onkeypress="return isAlphaNumSpace(event);" id="name_reg" type="text" class="validate" required 
                        style="background: #f8f8f8; color: #333; border-radius: 8px; padding: 12px; border: 1px solid #ccc;">
                    <label for="name_reg" style="color: #3E7B27; font-size: 20px; padding-left:10px;">Full Name</label>
                </div>

                <div class="input-field col s12">
                    <input onkeypress="return isEmail(event);" id="email_reg" type="email" class="validate" required 
                        style="background: #f8f8f8; color: #333; border-radius: 8px; padding: 12px; border: 1px solid #ccc;">
                    <label for="email_reg" style="color: #3E7B27; font-size: 20px; padding-left:10px;">Email</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6" style="padding-right:100px;">
                    <input id="password_reg" type="password" class="validate" required 
                        style="background: #f8f8f8; color: #333; border-radius: 8px; padding: 12px; border: 1px solid #ccc;">
                    <label for="password_reg" style="color: #3E7B27; font-size: 20px; padding-left:10px;">Password</label>
                </div>

                <div class="input-field col s6">
                    <input id="con_password_reg" type="password" class="validate" required 
                        style="background: #f8f8f8; color: #333; border-radius: 8px; padding: 12px; border: 1px solid #ccc;">
                    <label for="con_password_reg" style="color: #3E7B27; font-size: 20px; padding-left:10px;">Confirm Password</label>
                </div>
            </div>

            <div class="center">
                <a href="javascript:void(0)" class="waves-effect waves-light btn"
                    id="submit_reg" style="background: linear-gradient(45deg, #3E7B27, #81B214); border-radius: 25px; font-weight: bold; box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);">
                    Register
                </a>
            </div>
        </form>
    </div>
</div>

  </section>