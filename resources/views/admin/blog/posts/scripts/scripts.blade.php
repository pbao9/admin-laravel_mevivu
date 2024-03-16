<x-input type="hidden" id="tagRoute" name="route_search_select_tag" :value="route('admin.search.select.tag')" />
<x-input type="hidden" id="cateRoute" name="route_search_select_category" :value="route('admin.search.select.category')" />

<script>
    $(document).ready(function() {
        select2LoadData($('#tagRoute').val(), '.select2-bs5-ajax[name="tag_id[]"]');
        select2LoadData($('#cateRoute').val(), '.select2-bs5-ajax[name="categories_id[]"]');
    });
</script>
