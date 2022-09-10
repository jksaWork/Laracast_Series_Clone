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
                        <button type="button" class="btn btn-primary">
                            Save changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
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
            form:{
                title:'',
                vedio_id:'',
                episode_number:'',
                desciption:'',
            }
        }
    }
};
</script>

<style></style>
