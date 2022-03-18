<template>
    <section id="scroll">
        <div class="container px-5">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="display-5 fw-bold">For Employers</div>
                    <p class="text-gray-20 pt-3 text-center">
                        Find the best talent for your Full-time, part-time, freelance, or internship jobs in any location.
                    </p>
                </div>
            </div>
            <div class="row pt-5">
                <ActionCard img_name="post-jobs.jpg" title="Post Jobs For Free"></ActionCard>
                <ActionCard img_name="browse-candidates.jpg" title="Browse Candidates"></ActionCard>
                <ActionCard img_name="get-best-matches.jpg" title="Get Best Matches"> </ActionCard>
                <ActionCard img_name="personality-prediction.jpg" title="Personality Prediction"> </ActionCard>
            </div>
        </div>
    </section>
</template>

<script>
import ActionCard from '@/components/cardComponents/ActionCard.vue'
export default {
    components: {
        ActionCard,
    }
}
</script>

<style>

</style>