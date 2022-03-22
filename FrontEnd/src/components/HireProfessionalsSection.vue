<template>
    <section id="scroll2" class="section-bg-light-blue-666" style="margin-top: 50px">
        <div class="container px-5">
            <div class="row pt-5">
                <div class="col-lg-12">
                     <div class="fs-3 fw-bold">Find and Hire Professionals Across All Skills</div>
                </div>
            </div>
            <div class="row pt-5">
                <SkillCard title="Web, Mobile, & IT" icon_class="fas fa-laptop-code blue-dash skills-icon py-4"> </SkillCard>
                <SkillCard title="Marketing  & Sales" icon_class="fas fa-solid fa-bullhorn blue-dash skills-icon py-4"> </SkillCard>
                <SkillCard title="Design & Creative" icon_class="fas fa-solid fa-palette blue-dash skills-icon py-4"> </SkillCard>
                <SkillCard title="Engineering" icon_class="fas fa-solid fa-wrench blue-dash skills-icon py-4"> </SkillCard>
            </div>
            <div class="row pt-5">
                <SkillCard title="Customer Support" icon_class="fas fa-solid fa-headphones blue-dash skills-icon py-4"> </SkillCard>
                <SkillCard title="Writing  & Translation" icon_class="fas fa-solid fa-pen blue-dash skills-icon py-4"> </SkillCard>
                <SkillCard title="Business & Consulting" icon_class="fas fa-solid fa-briefcase blue-dash skills-icon py-4"> </SkillCard>
                <SkillCard title="Legal & Finance" icon_class="fas fa-solid fa-coins blue-dash skills-icon py-4"> </SkillCard>
            </div>
        </div>
    </section>

</template>

<script src="https://kit.fontawesome.com/e76fe25903.js" crossorigin="anonymous"></script>

<script>
import SkillCard from '@/components/cardComponents/SkillCard.vue'
export default {
    components: {
        SkillCard,
    }
}
</script>

<style>

</style>