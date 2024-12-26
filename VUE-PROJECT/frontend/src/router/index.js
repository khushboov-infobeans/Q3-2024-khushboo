import Vue from 'vue';
import Router from 'vue-router';
import StudentList from '../components/StudentList.vue';
import CreateStudent from '../components/CreateStudent.vue';
import EditStudent from '../components/EditStudent.vue';

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      name: 'studentsList',
      component: StudentList
    },
    {
      path: '/create',
      name: 'createStudent',
      component: CreateStudent
    },
    {
      path: '/edit/:id',
      name: 'editStudent',
      component: EditStudent
    }
  ]
});
