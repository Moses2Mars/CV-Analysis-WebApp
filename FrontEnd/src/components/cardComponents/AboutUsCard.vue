<template>
    <div class="col-lg-3">
        <div class="card" style="width: 18rem; border-radius: 20px; box-shadow: 5px 5px #888888;">
            <div class="card-body">
                <div class="text-start ps-4">
                    <i :class="icon" class="blue-dash skills-icon py-4" :style="'color:'+'#'+(Math.random()*0xFFFFFF<<0).toString(16)"></i>
                </div>
                <div class="fw-bold fs-5 py-3 text-left ps-4">{{title}}</div>
                <div class="card-text text-16 text-left ps-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: {
            default: '',
            type: String,
        },
        icon: {
            default: '',
            type: String,
        }
    }
}
</script>

<style>

</style>