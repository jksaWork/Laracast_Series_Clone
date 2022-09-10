<template>
    <div>
        <div class="pb-5">
            <div class="d-flex justify-content-between">
                <div class="col-md-6">

                    <create-lesson :seriesid='formatedLessons[0].series_id'></create-lesson>
                </div>
                <div class="col-md-6">
                    <h2 class="custom_head"><span> Lessons </span></h2>
                </div>

            </div>
            <div class="latest_post_container">
                <div
                    class="latest_post"
                    v-for="lesson in formatedLessons"
                    :key="lesson"
                >
                    <div class="latest_post_data">
                        <div>
                            <a :href="lesson.id" class="index_link">
                                {{ lesson.title }}
                            </a>
                        </div>
                        <div>
                            <a :href="lesson.id" class="index_link">
                                {{ lesson.description }}
                            </a>
                        </div>
                    </div>
                    <div class="latest_post_img">
                        <a
                            href="showArticals.php?post_id=<?php echo  $post['a_id'] ?>"
                            class="index_link"
                        >
                            <img
                                :src="lesson.image_url"
                                style="
                                    max-width: 60px;
                                    max-height: 50px;
                                    margin: 3px 0px 3px 10px;
                                "
                                alt="not found"
                            />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "lesson-list",
    props: ["default_lessons"],
    data() {
        return {
            lessons: this.default_lessons,
        };
    },
    mounted() {
        console.log(this.lessons);
    },
    methods: {
        ShowModal() {
            console.log("before_moutend");
            this.$emit("show_modal_in_child");
        },
    },
    computed: {
        formatedLessons() {
            return JSON.parse(this.lessons);
        },
    },
};
</script>
