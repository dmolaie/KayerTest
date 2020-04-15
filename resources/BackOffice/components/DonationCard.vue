<template>
    <div class="card">
        <template v-if="isPending">
            <image-cm src="/images/cards/single_overlay.jpg"
                      className="card__loading block w-full rounded-inherit object-contain"
                      class="block w-1/2 border border-solid border-sail rounded-1/2 m-0-auto"
            />
            <div class="h-0 overflow-hidden pointer-event-none">
                <span class="font-zar"
                      v-text="label"
                > </span>
            </div>
        </template>
        <template v-else>
            <image-cm :src="card"
                      className="block w-full rounded-inherit object-contain"
                      class="block w-1/2 border border-solid border-sail rounded-1/2 m-0-auto"
            />
        </template>
    </div>
</template>

<script>
    import donationCardService from '@vendor/plugin/donationCard';
    import ImageCm from '@vendor/components/image/Index.vue';

    export default {
        name: "DonationCard",
        data: () => ({
            card: '',
            isPending: true,
        }),
        props: {
            /**
             * @example 'single', 'mini', 'social'
             */
            type: {
                type: String,
                default: 'single'
            },
            label: {
                type: String,
                default: '',
            }
        },
        components: {
            ImageCm,
        },
        mounted() {
            this.$nextTick(() => {
                setTimeout(() => {
                    donationCardService(this.label)
                        .then(({ base64 }) => {
                            this.$set(this, 'card', base64);
                            this.$set(this, 'isPending', false);
                        })
                }, 200)
            })
        }
    }
</script>