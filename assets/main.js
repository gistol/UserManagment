import Vue from 'vue'
import UserList from './components/user/List'
import './main.scss';

new Vue({
    el: '#user-list',
    template: '<UserList/>',
    components: { UserList }
});