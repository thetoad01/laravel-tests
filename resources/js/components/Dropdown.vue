<template>
    <div class="dropdown relative">
        <div class="dropdown-trigger" @click.prevent="isOpen = ! isOpen">
            <slot name="trigger"></slot>
        </div>

        <transition name="pop-out-quick">
            <ul v-show="isOpen" class="absolute bg-black mt-2 py-2 rounded shadow text-white z-10">
                <slot></slot>
            </ul>
        </transition>
    </div>
</template>

<script>
export default {
    data() {
        return {
            isOpen: false,
        };
    },

    watch: {
        isOpen(isOpen) {
            if (isOpen) {
                document.addEventListener('click', this.closeIfClockedOutside);
            }
        }
    },

    methods: {
        closeIfClockedOutside() {
            if (! event.target.closest('.dropdown')) {                
                this.isOpen = false;
            }
        }
    }
}
</script>

<style>
    .pop-out-quick-enter-active,
    .pop-out-quick-leave-active {
        transition: all 0.4s;
    }

    .pop-out-quick-enter,
    .php-out-quick-leave-active {
        opacity: 0;
        transform: translateY(-7px);
    }
</style>

