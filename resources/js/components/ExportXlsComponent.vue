<template>
    <div class="container">
       <a class="btn btn-info" href="{{route('export-customers-list',['page'=>$page, 'order'=>$order === 'asc' ? 'desc' : $order])}}">Export Xls</a>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
