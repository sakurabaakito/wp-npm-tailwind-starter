import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'

export default () => {

    window.Alpine = Alpine

    Alpine.plugin(focus)
    Alpine.start()
};