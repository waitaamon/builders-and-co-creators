<template>
    <form class="form-inline">
        <div class="form-group mb-2">
            <label for="email" class="sr-only">Email</label>
            <input type="email" readonly class="form-control" id="email" value="email@example.com">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Subscribe</button>
    </form>
</template>

<script>
    export default {
        name: 'subscribe-form'
    }
</script>

<style scoped>

</style>