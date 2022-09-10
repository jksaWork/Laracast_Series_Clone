<template>
    <div>
        <!-- Button trigger modal -->
        <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#exampleModal"
        >
            Launch demo modal
        </button>

        <!-- Modal -->
        <div
            class="modal fade"
            id="exampleModal"
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
                        <button type="button" @click='CreateLesson()' class="btn btn-primary">
                            Create Lesson
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

import 'sweetalert2/src/sweetalert2.scss'
export default {
    name: "create-lesson",
    props: ['seriesid'],
    mounted() {
        this.$parent.$on("show_modal_in_child", () => {
            $("#AddLesson").modal();
            console.log("jksa");
            console.log(this.seriesid);
        });
    },
    data(){
        return {
            series:this.seriesid,
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
        }
    }
};
</script>

<style></style>
