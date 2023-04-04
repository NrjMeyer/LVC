import AllCommands from './components/AllCommands.vue';
import AddCommand from './components/AddCommand.vue';
import EditCommand from './components/EditCommand.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllCommands
    },
    {
        name: 'add',
        path: '/add',
        component: AddCommand
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditCommand
    }
];
