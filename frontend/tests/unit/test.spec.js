import {expect} from 'chai'
import {shallowMount, mount} from '@vue/test-utils'
import moxios from 'moxios';
import axios from 'axios';
import sinon from 'sinon';
import RecipeCard from '@/components/RecipeCard.vue';
import Register from '@/views/Register.vue';
import Recipe from '@/views/Recipe.vue';
import MyRecipes from '@/views/MyRecipes.vue';

describe('RecipeCard.vue', () => {
    it('Renders RecipeCard with props', () => {
        const recipe = {
            id: 11111,
            imageFile: 'https://cooking-application.s3.eu-north-1.amazonaws.com/images/recipeImages/chili-con-carne.jpg',
            title: 'Recipe',
            prepTime: '20 mins',
            cookTime: '20 mins',
            difficulty: 'easy',
        };
        const wrapper = shallowMount(RecipeCard, {
            propsData: {recipe}
        });
        expect(wrapper.html()).to.include(recipe);
    });
});

describe('Register.vue', () => {
    beforeEach(() => {
        moxios.install()
    });

    afterEach(() => {
        moxios.uninstall()
    });

    it('Throws error on missing field', async () => {
        const wrapper = shallowMount(Register, {
            data() {
                return {
                    name: "test",
                    email: "test@test.dk",
                    password: "test",
                    confirmPassword: "",
                }
            }
        });

        await wrapper.vm.register();

        expect(wrapper.find('#errorMsg').text()).to.equal('Please fill out all the fields!');
    });


    it('User registers', function (done) {

        const wrapper = shallowMount(Register, {
            data() {
                return {
                    name: "test",
                    email: "test@test.dk",
                    password: "test",
                    confirmPassword: "test",
                }
            }
        });

        moxios.stubRequest('/register', {
            status: 200,
            responseText: {
                name: wrapper.vm.name,
                email: wrapper.vm.email,
                password: wrapper.vm.password,
                confirmPassword: wrapper.vm.confirmPassword,
            }
        });

        let onFulfilled = sinon.spy();
        axios.get('/register').then(onFulfilled);

        moxios.wait(function () {
            console.log(onFulfilled.getCall(0).args[0].data);
            expect(onFulfilled.getCall(0).args[0].data).to.include({
                name: 'test',
                email: 'test@test.dk',
                password: 'test',
                confirmPassword: 'test'
            });
            done();
        });
    });
});

describe('MyRecipes.vue', () => {
    beforeEach(() => {
        sinon.stub(MyRecipes, 'mounted');

        moxios.install();

        global.localStorage = {
            state: {
                'token': ''
            },
            setItem(key, item) {
                this.state[key] = item
            },
            getItem(key) {
                return this.state[key]
            }
        }
    });

    afterEach(() => {
        MyRecipes.mounted.restore();
        moxios.uninstall();
    });

    it('Not authorized', function (done, reject) {
        shallowMount(MyRecipes);

        moxios.stubRequest('/recipe/1', {
            responseText: {
                msg: 'Not authorized'
            }
        });

        let onFulfilled = sinon.spy();

        axios.delete('/recipe/1').then(onFulfilled);

        moxios.wait(function () {
            expect(onFulfilled.getCall(0).args[0].data).to.include({msg: 'Not authorized'});
            done();
        });
    });
});