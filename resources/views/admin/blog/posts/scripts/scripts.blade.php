<x-input type="hidden" id="tagRoute" name="route_search_select_tag" :value="route('admin.search.select.tag')" />

<script>
    $(document).ready(function() {
        select2LoadData($('#tagRoute').val(), '.select2-bs5-ajax[name="tag_id[]"]');
    });
</script>
