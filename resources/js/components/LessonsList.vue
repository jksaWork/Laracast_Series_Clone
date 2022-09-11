<template>
    <div>
        <div class="pb-5">
            <div class="d-flex justify-content-between">
                <div class="col-md-6">

                    <create-lesson :seriesid='lessons[0].series_id'></create-lesson>
                </div>
                <div class="col-md-6">
                    <h2 class="custom_head"><span> Lessons </span></h2>
                </div>

            </div>
            <div class="latest_post_container">
                <div class="latest_post" style='margin-top:20px' v-for="lesson in lessons" :key="lesson.id">
                    <div class="latest_post_button">
                        <span class="btn btn-sm btn-danger" @click="DeleteItem(lesson)">
                            Delete
                        </span>
                        <span class="btn btn-sm btn-info" @click="EditLesson(lesson)">
                            Edit
                        </span>
                    </div>
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
                        <a href="showArticals.php?post_id=<?php echo  $post['a_id'] ?>" class="index_link">
                            <img :src="lesson.image_url" style="
                                    max-width: 60px;
                                    max-height: 50px;
                                    margin: 3px 0px 3px 10px;
                                " alt="not found" />
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios';
import Swal from 'sweetalert2/dist/sweetalert2.js'

export default {
    name: "lesson-list",
    props: ["default_lessons"],
    data() {
        return {
            lessons: JSON.parse(this.default_lessons),
        };
    },
    mounted() {
        console.log(this.lessons);
        this.$on('IncreaseLesson', (data) => {
            console.log(data);
            this.lessons.push(data);
        });
        this.$on('UpdateLesson' , (data) => {
            let lessonIndex = this.lessons.findIndex(i => i == data.id);
            this.lessons.splice(lessonIndex , 1 , data);
        })
    },
    methods: {
        ShowModal() {
            console.log("before_moutend");
            this.$emit("show_modal_in_child");
        },
        EditLesson(lesson){
            this.$emit('edit_lesson' ,lesson)
        },
        DeleteItem(lesson) {
            // alert('jksa ' +id );
            Swal.fire({
                title: 'Are Tou Want Delete The Lesseon?',
                // showDenyButton: true,
                showCancelButton: true,

                confirmButtonText: 'Delete',
                // denyButtonText: `Delete`,

            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    this.deleteLessonAjax(lesson.id);
                } else if (result.isDenied) {
                    Swal.fire('Delete Item Was Canceld', '', 'info')
                }
            })
        },
        deleteLessonAjax(id) {
            axios.delete('http://127.0.0.1:8000/admin/' + this.lessons[0].series_id + '/lessons/' + id)
                .then((res) => {
                    this.lessons = this.lessons.filter(el => el.id !== id);
                    console.log(this.lessons);
                    Swal.fire(res.data.message, '', 'success');

                })
                .catch((err => {
                    console.log(err)
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }));
        }
    },

};
</script>
