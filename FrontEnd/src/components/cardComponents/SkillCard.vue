<template>
    <div class="col-lg-3">
        <a href="#" class="card-hover text-decoration-none text-dark">
            <div class="card" style="width: 18rem; border-radius: 20px; border: none;">
                <div class="card-body">
                    <div class="fw-bold fs-5 py-3">
                        {{title}}
                    </div>
                    <div class="card-text text-16">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </div>
                    <div class="text-start ps-4">
                        <i :class="icon_class"></i>
                    </div>
                    <div class="trigger-arrow">
                        <div class="arrow-skills d-flex justify-content-center">
                            <i class="fas fa-solid fa-arrow-right arrow-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</template>
<script src="https://kit.fontawesome.com/e76fe25903.js" crossorigin="anonymous"></script>
<script>
export default {
    props: {
        title: {
            default: '',
            type: String,
        },
        icon_class: {
            default: '',
            type: String,
        }
    }
}
</script>

<style>

</style>