<template>
    <div class="col-lg-3">
        <div class="card" style="width: 18rem; border-radius: 20px; box-shadow: 5px 5px #888888;">
            <div class="card-body">
                <div class="text-start ps-4">
                    <i :class="icon" class="blue-dash skills-icon py-4 test-class" :style="color_string"></i>
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
    },
    data() {
        return {
            color_string: ' ',
        }
    },
    methods: {
        updateColor() {
            this.color_string='color: #'+(Math.random()*0xFFFFFF<<0).toString(16)
        }
    },
    mounted() {
        this.updateColor();
        setInterval(this.updateColor, 3000);
    }
}
</script>

<style scoped>
.test-class {
    transition: all 0.6s ease-in-out;
}
</style>