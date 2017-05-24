jQuery(document).ready(function($)
{
    // Check validation of grid skin event count
    $('#mec_skin_grid_count').keyup(function()
    {
        var valid = false;
        if($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3' || $(this).val() == '4' || $(this).val() == '6' || $(this).val() == '12')
        {
            valid = true;
        };
        
        if(valid == false)
        {
            $(this).addClass('bootstrap_unvalid');
            $('.mec-tooltiptext').css('visibility','visible');
        }
        else
        {
            $(this).removeClass('bootstrap_unvalid');
            $('.mec-tooltiptext').css('visibility', 'hidden');
        };
    });
    
    // MEC Select, Deselect, Toggle
    $(".mec-select-deselect-actions li").on('click', function()
    {
        var target = $(this).parent().data('for');
        var action = $(this).data('action');
        
        if(action === 'select-all')
        {
            $(target+' input[type=checkbox]').each(function()
            {
                this.checked = true;
            });
        }
        else if(action === 'deselect-all')
        {
            $(target+' input[type=checkbox]').each(function()
            {
                this.checked = false;
            });
        }
        else if(action === 'toggle')
        {
            $(target+' input[type=checkbox]').each(function()
            {
                this.checked = !this.checked;
            });
        }
    });
    
    // Initialize WP Color Picker
    $('.mec-color-picker').wpColorPicker();
    
    // Initialize MEC Skin Switcher
    $('#mec_skin').on('change', function()
    {
        mec_skin_toggle();
    });
    
    mec_skin_toggle();
    
    $('#mec_social_networks li, #mec_export_module_options li').on('click', function()
    {
        var id = $(this).data('id');
        var status = $('#mec_sn_'+id+' .mec-status').val();
        
        if(status == 1)
        {
            $('#mec_sn_'+id+' .mec-status').val(0);
            $('#mec_sn_'+id).removeClass('mec-enabled');
            $('#mec_sn_'+id).addClass('mec-disabled');
        }
        else
        {
            $('#mec_sn_'+id+' .mec-status').val(1);
            $('#mec_sn_'+id).removeClass('mec-disabled');
            $('#mec_sn_'+id).addClass('mec-enabled');
        }
    });
    
    $('#mec_reg_form_field_types button').on('click', function()
    {
        var type = $(this).data('type');
        var key = $('#mec_new_reg_field_key').val();
        var html = $('#mec_reg_field_'+type).html().replace(/:i:/g, key);
        
        $('#mec_reg_form_fields').append(html);
        $('#mec_new_reg_field_key').val(parseInt(key)+1);
        
        // Set onclick listener for add option fields
        mec_reg_fields_option_listeners();
    });
    
    // Set onclick listener for add option fields
    mec_reg_fields_option_listeners();
});

function mec_skin_toggle()
{
    var skin = jQuery('#mec_skin').val();
    
    jQuery('.mec-skin-options-container').hide();
    jQuery('#mec_'+skin+'_skin_options_container').show();
    
    jQuery('.mec-search-form-options-container').hide();
    jQuery('#mec_'+skin+'_search_form_options_container').show();
    
    if(skin === 'countdown' || skin === 'cover')
    {
        jQuery('#mec_meta_box_calendar_filter').hide();
        jQuery('#mec_meta_box_calendar_no_filter').show();
    }
    else
    {
        jQuery('#mec_meta_box_calendar_no_filter').hide();
        jQuery('#mec_meta_box_calendar_filter').show();
    }
    
    // Trigger change event of skin style in order to show/hide related fields
    jQuery('#mec_skin_'+skin+'_style').trigger('change');
}

function mec_reg_fields_remove(key)
{
    jQuery("#mec_reg_fields_"+key).remove();
}

function mec_reg_fields_option_listeners()
{
    jQuery('button.mec-reg-field-add-option').on('click', function()
    {
        var field_id = jQuery(this).data('field-id');
        var key = jQuery('#mec_new_reg_field_option_key_'+field_id).val();
        var html = jQuery('#mec_reg_field_option').html().replace(/:i:/g, key).replace(/:fi:/g, field_id);
        
        jQuery('#mec_reg_fields_'+field_id+'_options_container').append(html);
        jQuery('#mec_new_reg_field_option_key_'+field_id).val(parseInt(key)+1);
    });
    
    jQuery("#mec_reg_form_fields").sortable(
    {
        handle: '.mec_reg_field_sort'
    });
    
    jQuery(".mec_reg_fields_options_container").sortable(
    {
        handle: '.mec_reg_field_option_sort'
    });
}

function mec_reg_fields_option_remove(field_key, key)
{
    jQuery("#mec_reg_fields_option_"+field_key+"_"+key).remove();
}

function mec_skin_style_changed(skin, style)
{
    jQuery('.mec-skin-'+skin+'-date-format-container').hide();
    jQuery('#mec_skin_'+skin+'_date_format_'+style+'_container').show();
}