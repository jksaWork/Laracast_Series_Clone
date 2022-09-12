<template>
    <div>
        <!-- Button trigger modal -->
        <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#AddLesson"
        >
        Create Lesson
        </button>

        <!-- Modal -->
        <div
            class="modal fade"
            id="AddLesson"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Modal title
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="form-group">
                              <label for="">title</label>
                              <input type="text"
                                class="form-control" name=""  v-model="form.title" id="" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>
                            <!-- epodide number -->
                            <div class="form-group">
                              <label for="">epodide number</label>
                              <input type="text"
                                class="form-control" name=""   v-model="form.episode_number"  id="" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="form-group">
                              <label for="">vedio id</label>
                              <input type="text"
                                class="form-control" name=""   v-model="form.vedio_id"  id="" aria-describedby="helpId" placeholder="">
                              <small id="helpId" class="form-text text-muted">Help text</small>
                            </div>

                            <div class="form-group">
                              <label for="">desciption</label>
                              <br>
                                <textarea v-model='form.description' class='form-control'></textarea>
                             </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                        <button type="button" @click='CreateLesson()' class="btn btn-primary" v-if="!editing_mode">
                            Create Lesson
                        </button>
                        <button type="button" @click='UpdateLesson()' class="btn btn-primary" v-else>
                            Update Lesson
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2/dist/sweetalert2.js'
// import $ from 'jquery';
import 'sweetalert2/src/sweetalert2.scss'
import Lesson from '../../Helpers/Lesson.js';

export default {
    name: "create-lesson",
    props: ['seriesid'],
    mounted() {
        this.$parent.$on("show_modal_in_child", () => {
            $("#AddLesson").modal();
            console.log("jksa");
            console.log(this.seriesid);
        });
        this.$parent.$on('edit_lesson',(lesson) =>{
            // console.log(lesson);
            $("#AddLesson").modal('show');
            this.editing_mode = true;
            this.form.title =lesson.title;
            this.form.description =lesson.description;
            this.form.vedio_id =lesson.vedio_id;
            this.form.episode_number =lesson.episode_number;
            this.lesson_id = lesson.id
        })
    },
    data(){
        return {
            series:this.seriesid,
            editing_mode: false,
            lesson_id: null,
                form:{
                    title:'',
                    vedio_id:'',
                    episode_number:'',
                    description:'',
                }
        }
    },
    methods:{
        CreateLesson(){
            axios.post('http://127.0.0.1:8000/admin/' +this.series+ '/lessons', this.form).then(res => {
                if(res.status = 200){
                    Swal.fire(
                        'Good job!',
                        'Has Added Sccuessfuly',
                        'success'
                    );
                    $("#AddLesson").modal('hide');
                    console.log(res.data.data);
                    this.$parent.$emit('IncreaseLesson' , res.data.data);
                }
                    console.log(res);
            }).catch(err=>{
                console.log(err);
                Swal.fire({
                    title: 'Error!',
                    text: 'Do you want to continue',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                    })
            })

        },
        UpdateLesson(){
            axios.put('http://127.0.0.1:8000/admin/' +this.series+ '/lessons/' + this.lesson_id, this.form).then(res => {
                if(res.status = 200){
                    Swal.fire(
                        'Good job!',
                        'Lesson Update Sccuessfuley ',
                        'success'
                    );
                    console.log(res.data.data);
                    $("#AddLesson").modal('hide');
                    this.edit_lesson = false;
                    this.$parent.$emit('UpdateLesson' , res.data.data);
                }
                    console.log(res);
            }).catch(err=>{
                console.log(err);
                Swal.fire({
                    title: 'Error!',
                    text: 'Do you want to continue',
                    icon: 'error',
                    confirmButtonText: 'Cool'
                    })
            })
        } // end Update Lesson  Method
    }
};
</script>

<style></style>
