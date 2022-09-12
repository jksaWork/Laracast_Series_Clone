class Lesson{
    constructor(lesson){
                this.title = lesson.title || '';
                this.vedio_id = lesson.vedio_id  || '';
                this.episode_number= lesson.episode_number ||'';
                this.description = lesson.description  || '';
    }
}

export default Lesson;
