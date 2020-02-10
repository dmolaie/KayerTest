import Vue from 'vue';

const EventBus = new Vue();

const defaultOption = {
    type: 'simple',
    duration: 5000,
    visibility: true,
    closeWithClick: true,
};

export {
    EventBus,
    defaultOption
}