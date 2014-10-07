<!-- $Id: password_form.tpl.php 1 2014-08-20 23:09:19Z zefredz $ -->

<form id="passwordSettings" method="post" action="<?php echo $this->formAction; ?>" enctype="multipart/form-data">
    <?php echo $this->relayContext ?>
    <input type="hidden" id="cmd" name="cmd" value="registration" />
    <input type="hidden" name="claroFormId" value="<?php echo uniqid(''); ?>" />
    
    <?php if (claro_is_user_authenticated()) : ?>
    <input type="hidden" id="csrf_token" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>" />
    <?php endif; ?>
    
    <?php if (isset($this->data['confirmUserCreate'])) : ?>
    <input type="hidden" id="confirmUserCreate" name="confirmUserCreate" value="<?php echo ($this->data['confirmUserCreate'] ? 1 : 0); ?>" />
    <?php endif; ?>
    
    <?php if (!empty($this->data['user_id'])) : ?>
    <input type="hidden" id="uidToEdit" name="uidToEdit" value="<?php echo $this->data['user_id']; ?>" />
    <?php endif; ?>
    
    <!-- FIRST SECTION: platform's password -->
    <fieldset>
        <legend>
            <?php echo get_lang('User password'); ?>
        </legend>
        
        <dl>

            <?php if (in_array('password', $this->editableFields)) : ?>

                <dt>
                    <label for="password">

                    <?php 

                        if (!empty($this->data['user_id'])) :

                            echo get_lang('New password');

                        else :

                            echo get_lang('Password');

                        endif; 

                    ?>

                    <span class="required">*</span>
                </label>
                </dt>
                <dd>
                    <input type="password" autocomplete="off" name="password" id="password" />
                </dd>
                
                <dt>
                    <label for="password_conf">

                    <?php 

                        if (!empty($this->data['user_id'])) : 

                            echo get_lang('New password'); 

                        else : 

                            echo get_lang('Password'); 

                        endif; 

                    ?>

                    (<?php echo get_lang('Confirmation'); ?>)
                    <span class="required">*</span>
                    </label>
                </dt>
                <dd>
                    <input type="password" autocomplete="off" name="password_conf" id="password_conf" />
                </dd>
                
        </dl>
    </fieldset>

    <dl>
        <dt>
            <input type="submit" name="applyChange" id="applyChange" value="<?php echo get_lang('Ok'); ?>" />
        </dt>
        <dd></dd>
    </dl>
</form>

<p class="notice">
    <?php echo get_lang('<span class="required">*</span> denotes required field'); ?>
</p>