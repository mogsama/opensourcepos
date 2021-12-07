<?php
/**
 * @var string $controller_name
 */
?>
(function ($) {
	'use strict';

	$.fn.bootstrapTable.locales['<?php echo current_language_code() ?>'] = {
		formatLoadingMessage: function () {
			return "<?php echo lang('Bootstrap_tables.loading') ?>";
		},
		formatRecordsPerPage: function (pageNumber) {
			return "<?php echo lang('Bootstrap_tables.rows_per_page') ?>".replace('{0}', pageNumber);
		},
		formatShowingRows: function (pageFrom, pageTo, totalRows) {
			return "<?php echo lang('Bootstrap_tables.page_from_to') ?>".replace('{0}', pageFrom).replace('{1}', pageTo).replace('{2}', totalRows);
		},
		formatSearch: function () {
			return "<?php echo lang('Common.search') ?>";
		},
		formatNoMatches: function () {
			return "<?php echo lang(preg_match('(customers|suppliers|employees)', $controller_name)
				? 'common_no_persons_to_display'
				: "$controller_name.no_$controller_name" . '_to_display')
			?>";
		},
		formatPaginationSwitch: function () {
			return "<?php echo lang('Bootstrap_tables.hide_show_pagination') ?>";
		},
		formatRefresh: function () {
			return "<?php echo lang('Bootstrap_tables.refresh') ?>";
		},
		formatToggle: function () {
			return "<?php echo lang('Bootstrap_tables.toggle') ?>";
		},
		formatColumns: function () {
			return "<?php echo lang('Bootstrap_tables.columns') ?>";
		},
		formatAllRows: function () {
			return "<?php echo lang('Bootstrap_tables.all') ?>";
		},
		formatConfirmAction: function(action) {
			if (action == "delete")
			{
				return "<?php echo lang((isset($editable) ? $editable : $controller_name). ".confirm_delete") ?>";
			}
			else
			{
				return "<?php echo lang((isset($editable) ? $editable : $controller_name). ".confirm_restore") ?>";
			}
        }
	};

	$.extend($.fn.bootstrapTable.defaults, $.fn.bootstrapTable.locales["<?php echo current_language_code() ?>"]);

})(jQuery);