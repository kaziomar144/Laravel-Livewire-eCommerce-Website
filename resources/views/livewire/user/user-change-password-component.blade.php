{{-- <!--main area--> --}}
<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>change password</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                <div class=" main-content-area">
                    <div class="wrap-login-item ">						
                        <div class="login-form form-item form-stl">
                            <form id="changePassword" name="frm-login" wire:submit.prevent="changePassword">
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Change Password</h3>										
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-uname">Current Password:</label>
                                    <input type="password" name="current_password" placeholder="Current Password" wire:model="current_password">
                                    @error('current_password')
                                        <span style="color: crimson">{{$message}}</span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-pass">New Password:</label>
                                    <input type="password" name="new_password" placeholder="New Password" wire:model="new_password">
                                    @error('new_password')
                                    <span style="color: crimson">{{$message}}</span>
                                    @enderror
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-login-pass">Confirm Password:</label>
                                    <input type="password" name="confirm_password" placeholder="Confirm Password" wire:model="confirm_password">
                                    @error('confirm_password')
                                    <span style="color: crimson">{{$message}}</span>
                                    @enderror
                                </fieldset>
                                <input type="submit" class="btn btn-submit" value="Save Change" name="submit">
                            </form>
                        </div>												
                    </div>
                </div><!--end main products area-->		
            </div>
        </div><!--end row-->

    </div><!--end container-->

</main>
{{-- <!--main area--> --}}