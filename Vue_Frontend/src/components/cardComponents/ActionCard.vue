<template>
    <div class="col-lg-3">
        <div class="card" style="width: 18rem; background-color: #E9F5FE; border-radius: 20px; border: none;">
            <img :src="require('@/assets/img/'+img_name)" class="card-img-top" alt="Post Jobs Image" height="200px">
            <div class="card-body">
                <div class="fw-bold fs-5">{{title}}</div>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        img_name: {
            default: '',
            type: String,
        },
        title: {
            default: '',
            type: String,
        }
    }
}
</script>

<style>

</style>