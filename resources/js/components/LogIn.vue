<template>
<div>
    <div v-for="(form, index) in forms" :key="index">

          <data-table :form="form"/>

      </div>

      </div>

</template>

<script>
// I am not sure why this is not working - It woked then stoped displaying for some reason
import DataTable from './DataTable.vue';

export default {
  props: ['forms'],
    components: {
        DataTable
    }
}
</script>
