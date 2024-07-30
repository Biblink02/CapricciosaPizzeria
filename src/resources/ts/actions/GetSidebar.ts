import {usePage} from '@inertiajs/vue3';
import {SharedPage} from '@/vue/types/custom/models/SharedPage';
import route from 'ziggy-js';

export const getSidebar = () => usePage<SharedPage>().props.sidebar.map(item => {
    const {route: itemRoute, current, name} = item;
    return {
        href: route().has(itemRoute) ? route(itemRoute) : '#',
        current: current,
        name: name,
    };
});
