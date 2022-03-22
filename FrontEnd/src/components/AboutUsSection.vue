<template>
    <section id="scroll5">
        <div class="container px-5">
            <div class="row align-items-center pt-5">
                <div class="col-12">
                    <div class="display-5 fw-bold">
                        Why RecruitWorld?
                    </div>
                </div>
            </div>

             <div class="row pt-5">
                <AboutUsCard title="Free Job Posting" icon="fas fa-solid fa-suitcase"></AboutUsCard>
                <AboutUsCard title="Talent Marketplace" icon="fas fa-solid fa-rotate-left"></AboutUsCard>
                <AboutUsCard title="All Types of Jobs" icon="fas fa-solid fa-search"></AboutUsCard>
                <AboutUsCard title="All Locations" icon="fas fa-solid fa-map-marker blue-dash"></AboutUsCard>
            </div>
            <div class="row pt-5">
                <AboutUsCard title="Smart Matching" icon="fas fa-solid fa-thumbs-up"></AboutUsCard>
                <AboutUsCard title="Power of Networking" icon="fas fa-solid fa-group"></AboutUsCard>
                <AboutUsCard title="Creativity Showcase" icon="fas fa-solid fa-palette"></AboutUsCard>
                <AboutUsCard title="Personality Prediction" icon="fas fa-solid fa-cubes"></AboutUsCard>
            </div>
        </div>
    </section>
</template>

    
<script>
import AboutUsCard from '@/components/cardComponents/AboutUsCard.vue'
export default {
    components: {
        AboutUsCard
    }
}
</script>
