<?php
// ExtraaEdge enquiry form widget container.
// Usage: $eeFormId = 'ee-form-14'; include __DIR__ . '/enquiry-widget.php';
$eeFormId = $eeFormId ?? 'ee-form-14';
?>
<div id="<?= htmlspecialchars($eeFormId, ENT_QUOTES, 'UTF-8') ?>" class="ee-form-widget" style="padding: 8px; scroll-margin-top: 90px;"></div>
<style>
    .ee-form-widget { container-type: inline-size; }
    /* Two-column rows when the mount is wide enough — mirrors the widget's
       own .ee-form-body.TWO_COLUMNS rules, applied via container query so the
       400px program modal and phones stay single-column. */
    @container (min-width: 520px) {
        .ee-form-widget .ee-form-body { display: flex; flex-direction: row; flex-wrap: wrap; }
        .ee-form-widget .ee-form-body > .ee-row { margin-left: 3%; margin-right: 3%; }
        .ee-form-widget .ee-form-body > .ee-row:not(.full-width) { width: calc(44%); }
        .ee-form-widget .ee-form-body > .ee-row.full-width { width: calc(94%); }
    }
    /* Modals and small viewports: always single column (avoids overlap with side tabs) */
    @media (max-width: 767px) {
        .ee-form-widget .ee-form-body { display: block !important; }
        .ee-form-widget .ee-form-body > .ee-row,
        .ee-form-widget .ee-form-body > .ee-row.full-width {
            width: 100% !important;
            max-width: 100% !important;
            margin-left: 0 !important;
            margin-right: 0 !important;
        }
    }
    .enquiry-popup-container .ee-form-widget,
    .program-enquiry-form-wrap .ee-form-widget {
        padding: 4px !important;
        max-width: 100%;
        box-sizing: border-box;
    }
    .enquiry-popup-container .ee-form-widget .ee-form-body,
    .program-enquiry-form-wrap .ee-form-widget .ee-form-body {
        display: block !important;
    }
    .enquiry-popup-container .ee-form-widget .ee-form-body > .ee-row,
    .program-enquiry-form-wrap .ee-form-widget .ee-form-body > .ee-row {
        width: 100% !important;
        max-width: 100% !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
    }
    .enquiry-popup-container .ee-form-footer,
    .program-enquiry-form-wrap .ee-form-footer {
        overflow-wrap: anywhere;
        word-break: break-word;
    }
    .enquiry-popup-container .ee-form-footer label,
    .program-enquiry-form-wrap .ee-form-footer label,
    .enquiry-popup-container .ee-form-footer span,
    .program-enquiry-form-wrap .ee-form-footer span {
        white-space: normal !important;
        line-height: 1.4;
    }
    .ee-form-widget .ee-row:not(:last-child) { margin-bottom: 14px; }
    .ee-form-widget .ee-row select { padding-top: 14px !important; padding-bottom: 6px !important; }
    .ee-form-widget h2 { display: none; }
    .jquery-modal { z-index: 1000001 !important; }
    @media (max-height: 800px) {
        .ee-form-widget .ee-row:not(:last-child) { margin-bottom: 8px; }
        .ee-form-widget .ee-row select { padding-top: 8px !important; padding-bottom: 4px !important; }
        .ee-form-widget .ee-row label { padding: 4px 4px 2px 0 !important; }
        .ee-form-widget .ee-form-footer { margin-top: 8px; }
    }
</style>
<script>
    window.__eeFormIds = window.__eeFormIds || [];
    if (window.__eeFormIds.indexOf(<?= json_encode($eeFormId) ?>) === -1) {
        window.__eeFormIds.push(<?= json_encode($eeFormId) ?>);
    }
    if (!window.__eeCaptchaFix) {
        window.__eeCaptchaFix = true;
        document.addEventListener('click', function (e) {
            var btn = e.target && e.target.closest ? e.target.closest('.refreshButtonContainer') : null;
            if (!btn) return;
            e.preventDefault();
            e.stopPropagation();
            var scope = btn.closest('.captchaContainer') || btn.closest('.ee-row');
            var row = btn.closest('.ee-row');
            var input = row ? row.querySelector('input') : null;
            var ref = input && window.jQuery ? jQuery(input).data('classRef') : null;
            var canvas = scope ? scope.querySelector('canvas') : null;
            if (ref && typeof ref.generateCaptcha === 'function' && canvas) {
                var ctx = canvas.getContext('2d');
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ref.generateCaptcha(ctx);
            }
        }, true);
    }
</script>
