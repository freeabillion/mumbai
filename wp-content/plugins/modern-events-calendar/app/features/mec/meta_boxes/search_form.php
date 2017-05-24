<?php
/** no direct access **/
defined('_MECEXEC_') or die();

// Search Form Options
$sf_options = get_post_meta($post->ID, 'sf-options', true);
?>
<div class="mec-calendar-metabox">
    
    <div class="mec-form-row mec-switcher">
        <?php $sf_status = get_post_meta($post->ID, 'sf_status', true); ?>
        <div class="mec-col-8">
            <label><?php _e('Show Search Form', 'mec'); ?></label>
        </div>
        <div class="mec-col-4">
            <input type="hidden" name="mec[sf_status]" value="0" />
            <input type="checkbox" name="mec[sf_status]" id="mec_sf_status" value="1" <?php if($sf_status == '' or $sf_status == 1) echo 'checked="checked"'; ?> />
            <label for="mec_sf_status"></label>
        </div>
    </div>
    
    <!-- Search Form OPTIONS -->
    <div class="mec-meta-box-fields" id="mec_meta_box_calendar_search_form_options">
        
        <div class="mec-search-forms-options-container">
            
            <!-- List View -->
            <div class="mec-search-form-options-container mec-util-hidden" id="mec_list_search_form_options_container">
                <?php $sf_options_list = isset($sf_options['list']) ? $sf_options['list'] : array(); ?>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_list_category"><?php _e('Category', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][list][category][type]" id="mec_sf_list_category">
						<option value="0" <?php if(isset($sf_options_list['category']) and isset($sf_options_list['category']['type']) and $sf_options_list['category']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_list['category']) and isset($sf_options_list['category']['type']) and $sf_options_list['category']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_list_location"><?php _e('Location', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][list][location][type]" id="mec_sf_list_location">
						<option value="0" <?php if(isset($sf_options_list['location']) and isset($sf_options_list['location']['type']) and $sf_options_list['location']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_list['location']) and isset($sf_options_list['location']['type']) and $sf_options_list['location']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_list_organizer"><?php _e('Organizer', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][list][organizer][type]" id="mec_sf_list_organizer">
						<option value="0" <?php if(isset($sf_options_list['organizer']) and isset($sf_options_list['organizer']['type']) and $sf_options_list['organizer']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_list['organizer']) and isset($sf_options_list['organizer']['type']) and $sf_options_list['organizer']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_list_label"><?php _e('Label', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][list][label][type]" id="mec_sf_list_label">
						<option value="0" <?php if(isset($sf_options_list['label']) and isset($sf_options_list['label']['type']) and $sf_options_list['label']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_list['label']) and isset($sf_options_list['label']['type']) and $sf_options_list['label']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_list_month_filter"><?php _e('Month Filter', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][list][month_filter][type]" id="mec_sf_list_month_filter">
						<option value="0" <?php if(isset($sf_options_list['month_filter']) and isset($sf_options_list['month_filter']['type']) and $sf_options_list['month_filter']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_list['month_filter']) and isset($sf_options_list['month_filter']['type']) and $sf_options_list['month_filter']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_list_text_search"><?php _e('Text Search', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][list][text_search][type]" id="mec_sf_list_text_search">
						<option value="0" <?php if(isset($sf_options_list['text_search']) and isset($sf_options_list['text_search']['type']) and $sf_options_list['text_search']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="text_input" <?php if(isset($sf_options_list['text_search']) and isset($sf_options_list['text_search']['type']) and $sf_options_list['text_search']['type'] == 'text_input') echo 'selected="selected"'; ?>><?php _e('Text Input', 'mec'); ?></option>
                    </select>
                </div>
            </div>
            
            <!-- Grid View -->
            <div class="mec-search-form-options-container mec-util-hidden" id="mec_grid_search_form_options_container">
                <?php $sf_options_grid = isset($sf_options['grid']) ? $sf_options['grid'] : array(); ?>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_grid_category"><?php _e('Category', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][grid][category][type]" id="mec_sf_grid_category">
                        <option value="0" <?php if(isset($sf_options_grid['category']) and isset($sf_options_grid['category']['type']) and $sf_options_grid['category']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_grid['category']) and isset($sf_options_grid['category']['type']) and $sf_options_grid['category']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_grid_location"><?php _e('Location', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][grid][location][type]" id="mec_sf_grid_location">
                        <option value="0" <?php if(isset($sf_options_grid['location']) and isset($sf_options_grid['location']['type']) and $sf_options_grid['location']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_grid['location']) and isset($sf_options_grid['location']['type']) and $sf_options_grid['location']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_grid_organizer"><?php _e('Organizer', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][grid][organizer][type]" id="mec_sf_grid_organizer">
                        <option value="0" <?php if(isset($sf_options_grid['organizer']) and isset($sf_options_grid['organizer']['type']) and $sf_options_grid['organizer']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_grid['organizer']) and isset($sf_options_grid['organizer']['type']) and $sf_options_grid['organizer']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_grid_label"><?php _e('Label', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][grid][label][type]" id="mec_sf_grid_label">
                        <option value="0" <?php if(isset($sf_options_grid['label']) and isset($sf_options_grid['label']['type']) and $sf_options_grid['label']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_grid['label']) and isset($sf_options_grid['label']['type']) and $sf_options_grid['label']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_grid_month_filter"><?php _e('Month Filter', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][grid][month_filter][type]" id="mec_sf_grid_month_filter">
                        <option value="0" <?php if(isset($sf_options_grid['month_filter']) and isset($sf_options_grid['month_filter']['type']) and $sf_options_grid['month_filter']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_grid['month_filter']) and isset($sf_options_grid['month_filter']['type']) and $sf_options_grid['month_filter']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_grid_text_search"><?php _e('Text Search', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][grid][text_search][type]" id="mec_sf_grid_text_search">
                        <option value="0" <?php if(isset($sf_options_grid['text_search']) and isset($sf_options_grid['text_search']['type']) and $sf_options_grid['text_search']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="text_input" <?php if(isset($sf_options_grid['text_search']) and isset($sf_options_grid['text_search']['type']) and $sf_options_grid['text_search']['type'] == 'text_input') echo 'selected="selected"'; ?>><?php _e('Text Input', 'mec'); ?></option>
                    </select>
                </div>
            </div>

            <!-- Carousel View -->
            <div class="mec-search-form-options-container mec-util-hidden" id="mec_carousel_search_form_options_container">
                <?php $sf_options_carousel = isset($sf_options['carousel']) ? $sf_options['carousel'] : array(); ?>
                <p><?php _e('No Search Options', 'mec'); ?></p>
            </div>
            
            <!-- Full Calendar -->
            <div class="mec-search-form-options-container mec-util-hidden" id="mec_full_calendar_search_form_options_container">
                <?php $sf_options_full_calendar = isset($sf_options['full_calendar']) ? $sf_options['full_calendar'] : array(); ?>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_full_calendar_month_filter"><?php _e('Month Filter', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][full_calendar][month_filter][type]" id="mec_sf_full_calendar_month_filter">
						<option value="0" <?php if(isset($sf_options_full_calendar['month_filter']) and isset($sf_options_full_calendar['month_filter']['type']) and $sf_options_full_calendar['month_filter']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_full_calendar['month_filter']) and isset($sf_options_full_calendar['month_filter']['type']) and $sf_options_full_calendar['month_filter']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_full_calendar_text_search"><?php _e('Text Search', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][full_calendar][text_search][type]" id="mec_sf_full_calendar_text_search">
						<option value="0" <?php if(isset($sf_options_full_calendar['text_search']) and isset($sf_options_full_calendar['text_search']['type']) and $sf_options_full_calendar['text_search']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="text_input" <?php if(isset($sf_options_full_calendar['text_search']) and isset($sf_options_full_calendar['text_search']['type']) and $sf_options_full_calendar['text_search']['type'] == 'text_input') echo 'selected="selected"'; ?>><?php _e('Text Input', 'mec'); ?></option>
                    </select>
                </div>
            </div>
            
            <!-- Monthly View -->
            <div class="mec-search-form-options-container mec-util-hidden" id="mec_monthly_view_search_form_options_container">
                <?php $sf_options_monthly_view = isset($sf_options['monthly_view']) ? $sf_options['monthly_view'] : array(); ?>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_monthly_view_category"><?php _e('Category', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][monthly_view][category][type]" id="mec_sf_monthly_view_category">
						<option value="0" <?php if(isset($sf_options_monthly_view['category']) and isset($sf_options_monthly_view['category']['type']) and $sf_options_monthly_view['category']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_monthly_view['category']) and isset($sf_options_monthly_view['category']['type']) and $sf_options_monthly_view['category']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_monthly_view_location"><?php _e('Location', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][monthly_view][location][type]" id="mec_sf_monthly_view_location">
						<option value="0" <?php if(isset($sf_options_monthly_view['location']) and isset($sf_options_monthly_view['location']['type']) and $sf_options_monthly_view['location']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_monthly_view['location']) and isset($sf_options_monthly_view['location']['type']) and $sf_options_monthly_view['location']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_monthly_view_organizer"><?php _e('Organizer', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][monthly_view][organizer][type]" id="mec_sf_monthly_view_organizer">
						<option value="0" <?php if(isset($sf_options_monthly_view['organizer']) and isset($sf_options_monthly_view['organizer']['type']) and $sf_options_monthly_view['organizer']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_monthly_view['organizer']) and isset($sf_options_monthly_view['organizer']['type']) and $sf_options_monthly_view['organizer']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_monthly_view_label"><?php _e('Label', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][monthly_view][label][type]" id="mec_sf_monthly_view_label">
						<option value="0" <?php if(isset($sf_options_monthly_view['label']) and isset($sf_options_monthly_view['label']['type']) and $sf_options_monthly_view['label']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_monthly_view['label']) and isset($sf_options_monthly_view['label']['type']) and $sf_options_monthly_view['label']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_monthly_view_month_filter"><?php _e('Month Filter', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][monthly_view][month_filter][type]" id="mec_sf_monthly_view_month_filter">
						<option value="0" <?php if(isset($sf_options_monthly_view['month_filter']) and isset($sf_options_monthly_view['month_filter']['type']) and $sf_options_monthly_view['month_filter']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_monthly_view['month_filter']) and isset($sf_options_monthly_view['month_filter']['type']) and $sf_options_monthly_view['month_filter']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_monthly_view_text_search"><?php _e('Text Search', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][monthly_view][text_search][type]" id="mec_sf_monthly_view_text_search">
						<option value="0" <?php if(isset($sf_options_monthly_view['text_search']) and isset($sf_options_monthly_view['text_search']['type']) and $sf_options_monthly_view['text_search']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="text_input" <?php if(isset($sf_options_monthly_view['text_search']) and isset($sf_options_monthly_view['text_search']['type']) and $sf_options_monthly_view['text_search']['type'] == 'text_input') echo 'selected="selected"'; ?>><?php _e('Text Input', 'mec'); ?></option>
                    </select>
                </div>
            </div>
            
            <!-- Map Skin -->
            <div class="mec-search-form-options-container mec-util-hidden" id="mec_map_search_form_options_container">
                <?php $sf_options_map = isset($sf_options['map']) ? $sf_options['map'] : array(); ?>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_map_category"><?php _e('Category', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][map][category][type]" id="mec_sf_map_category">
						<option value="0" <?php if(isset($sf_options_map['category']) and isset($sf_options_map['category']['type']) and $sf_options_map['category']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_map['category']) and isset($sf_options_map['category']['type']) and $sf_options_map['category']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_map_location"><?php _e('Location', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][map][location][type]" id="mec_sf_map_location">
						<option value="0" <?php if(isset($sf_options_map['location']) and isset($sf_options_map['location']['type']) and $sf_options_map['location']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_map['location']) and isset($sf_options_map['location']['type']) and $sf_options_map['location']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_map_organizer"><?php _e('Organizer', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][map][organizer][type]" id="mec_sf_map_organizer">
						<option value="0" <?php if(isset($sf_options_map['organizer']) and isset($sf_options_map['organizer']['type']) and $sf_options_map['organizer']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_map['organizer']) and isset($sf_options_map['organizer']['type']) and $sf_options_map['organizer']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_map_label"><?php _e('Label', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][map][label][type]" id="mec_sf_map_label">
						<option value="0" <?php if(isset($sf_options_map['label']) and isset($sf_options_map['label']['type']) and $sf_options_map['label']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_map['label']) and isset($sf_options_map['label']['type']) and $sf_options_map['label']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_map_text_search"><?php _e('Text Search', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][map][text_search][type]" id="mec_sf_map_text_search">
						<option value="0" <?php if(isset($sf_options_map['text_search']) and isset($sf_options_map['text_search']['type']) and $sf_options_map['text_search']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="text_input" <?php if(isset($sf_options_map['text_search']) and isset($sf_options_map['text_search']['type']) and $sf_options_map['text_search']['type'] == 'text_input') echo 'selected="selected"'; ?>><?php _e('Text Input', 'mec'); ?></option>
                    </select>
                </div>
            </div>
            
            <!-- Daily View -->
            <div class="mec-search-form-options-container mec-util-hidden" id="mec_daily_view_search_form_options_container">
                <?php $sf_options_daily_view = isset($sf_options['daily_view']) ? $sf_options['daily_view'] : array(); ?>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_daily_view_category"><?php _e('Category', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][daily_view][category][type]" id="mec_sf_daily_view_category">
						<option value="0" <?php if(isset($sf_options_daily_view['category']) and isset($sf_options_daily_view['category']['type']) and $sf_options_daily_view['category']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_daily_view['category']) and isset($sf_options_daily_view['category']['type']) and $sf_options_daily_view['category']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_daily_view_location"><?php _e('Location', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][daily_view][location][type]" id="mec_sf_daily_view_location">
						<option value="0" <?php if(isset($sf_options_daily_view['location']) and isset($sf_options_daily_view['location']['type']) and $sf_options_daily_view['location']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_daily_view['location']) and isset($sf_options_daily_view['location']['type']) and $sf_options_daily_view['location']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_daily_view_organizer"><?php _e('Organizer', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][daily_view][organizer][type]" id="mec_sf_daily_view_organizer">
						<option value="0" <?php if(isset($sf_options_daily_view['organizer']) and isset($sf_options_daily_view['organizer']['type']) and $sf_options_daily_view['organizer']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_daily_view['organizer']) and isset($sf_options_daily_view['organizer']['type']) and $sf_options_daily_view['organizer']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_daily_view_label"><?php _e('Label', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][daily_view][label][type]" id="mec_sf_daily_view_label">
						<option value="0" <?php if(isset($sf_options_daily_view['label']) and isset($sf_options_daily_view['label']['type']) and $sf_options_daily_view['label']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_daily_view['label']) and isset($sf_options_daily_view['label']['type']) and $sf_options_daily_view['label']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_daily_view_month_filter"><?php _e('Month Filter', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][daily_view][month_filter][type]" id="mec_sf_daily_view_month_filter">
						<option value="0" <?php if(isset($sf_options_daily_view['month_filter']) and isset($sf_options_daily_view['month_filter']['type']) and $sf_options_daily_view['month_filter']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_daily_view['month_filter']) and isset($sf_options_daily_view['month_filter']['type']) and $sf_options_daily_view['month_filter']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_daily_view_text_search"><?php _e('Text Search', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][daily_view][text_search][type]" id="mec_sf_daily_view_text_search">
						<option value="0" <?php if(isset($sf_options_daily_view['text_search']) and isset($sf_options_daily_view['text_search']['type']) and $sf_options_daily_view['text_search']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="text_input" <?php if(isset($sf_options_daily_view['text_search']) and isset($sf_options_daily_view['text_search']['type']) and $sf_options_daily_view['text_search']['type'] == 'text_input') echo 'selected="selected"'; ?>><?php _e('Text Input', 'mec'); ?></option>
                    </select>
                </div>
            </div>
            
            <!-- Weekly View -->
            <div class="mec-search-form-options-container mec-util-hidden" id="mec_weekly_view_search_form_options_container">
                <?php $sf_options_weekly_view = isset($sf_options['weekly_view']) ? $sf_options['weekly_view'] : array(); ?>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_weekly_view_category"><?php _e('Category', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][weekly_view][category][type]" id="mec_sf_weekly_view_category">
						<option value="0" <?php if(isset($sf_options_weekly_view['category']) and isset($sf_options_weekly_view['category']['type']) and $sf_options_weekly_view['category']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_weekly_view['category']) and isset($sf_options_weekly_view['category']['type']) and $sf_options_weekly_view['category']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_weekly_view_location"><?php _e('Location', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][weekly_view][location][type]" id="mec_sf_weekly_view_location">
						<option value="0" <?php if(isset($sf_options_weekly_view['location']) and isset($sf_options_weekly_view['location']['type']) and $sf_options_weekly_view['location']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_weekly_view['location']) and isset($sf_options_weekly_view['location']['type']) and $sf_options_weekly_view['location']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_weekly_view_organizer"><?php _e('Organizer', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][weekly_view][organizer][type]" id="mec_sf_weekly_view_organizer">
						<option value="0" <?php if(isset($sf_options_weekly_view['organizer']) and isset($sf_options_weekly_view['organizer']['type']) and $sf_options_weekly_view['organizer']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_weekly_view['organizer']) and isset($sf_options_weekly_view['organizer']['type']) and $sf_options_weekly_view['organizer']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_weekly_view_label"><?php _e('Label', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][weekly_view][label][type]" id="mec_sf_weekly_view_label">
						<option value="0" <?php if(isset($sf_options_weekly_view['label']) and isset($sf_options_weekly_view['label']['type']) and $sf_options_weekly_view['label']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_weekly_view['label']) and isset($sf_options_weekly_view['label']['type']) and $sf_options_weekly_view['label']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_weekly_view_month_filter"><?php _e('Month Filter', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][weekly_view][month_filter][type]" id="mec_sf_weekly_view_month_filter">
						<option value="0" <?php if(isset($sf_options_weekly_view['month_filter']) and isset($sf_options_weekly_view['month_filter']['type']) and $sf_options_weekly_view['month_filter']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="dropdown" <?php if(isset($sf_options_weekly_view['month_filter']) and isset($sf_options_weekly_view['month_filter']['type']) and $sf_options_weekly_view['month_filter']['type'] == 'dropdown') echo 'selected="selected"'; ?>><?php _e('Dropdown', 'mec'); ?></option>
                    </select>
                </div>
                <div class="mec-form-row">
                    <label class="mec-col-12" for="mec_sf_weekly_view_text_search"><?php _e('Text Search', 'mec'); ?></label>
                    <select class="mec-col-12" name="mec[sf-options][weekly_view][text_search][type]" id="mec_sf_weekly_view_text_search">
						<option value="0" <?php if(isset($sf_options_weekly_view['text_search']) and isset($sf_options_weekly_view['text_search']['type']) and $sf_options_weekly_view['text_search']['type'] == '0') echo 'selected="selected"'; ?>><?php _e('Disabled', 'mec'); ?></option>
                        <option value="text_input" <?php if(isset($sf_options_weekly_view['text_search']) and isset($sf_options_weekly_view['text_search']['type']) and $sf_options_weekly_view['text_search']['type'] == 'text_input') echo 'selected="selected"'; ?>><?php _e('Text Input', 'mec'); ?></option>
                    </select>
                </div>
            </div>
            
            <!-- Cover -->
            <div class="mec-search-form-options-container mec-util-hidden" id="mec_cover_search_form_options_container">
                <?php $sf_options_cover = isset($sf_options['cover']) ? $sf_options['cover'] : array(); ?>
                <p><?php _e('No Search Options', 'mec'); ?></p>
            </div>
            
            <!-- Countdown -->
            <div class="mec-search-form-options-container mec-util-hidden" id="mec_countdown_search_form_options_container">
                <?php $sf_options_countdown = isset($sf_options['countdown']) ? $sf_options['countdown'] : array(); ?>
                <p><?php _e('No Search Options', 'mec'); ?></p>
            </div>
            
            <!-- Custom Skins -->
            <?php do_action('mec_sf_options', $sf_options); ?>
        </div>
    </div>
</div>