<template>
    <section id="scroll3">
        <div class="container px-5">
            <div class="row pt-5 align-items-center">
                <div class="col-lg-12 text-center">
                    <div class="display-5 fw-bold">For Job Seekers</div>
                    <p class="text-break text-gray-20 pt-3 ">
                        Expand your network and portfolio, receive work recommendations, and get hired for your dream job.
                    </p>
                </div>
            </div>

            <div class="row pt-5">
                <ActionCard img_name="expand-your-network.jpg" title="Expand Your Network"></ActionCard>
                <ActionCard img_name="post-services.jpg" title="Post Services"></ActionCard>
                <ActionCard img_name="dream-job.jpg" title="Apply to Your Dream Jobs"> </ActionCard>
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