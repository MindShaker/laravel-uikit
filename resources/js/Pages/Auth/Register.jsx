import { useEffect } from 'react';
import { Head, Link, useForm } from '@inertiajs/react';

import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import TextInput from '@/Components/TextInput';

export default function Register() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();

        post(route('register'));
    };

    return (
        <GuestLayout>
            <Head title="Register" />

            <form onSubmit={submit}>
                <div className='uk-margin'>
                    <label htmlFor="name">
                        Name
                    </label>

                    <TextInput
                        id="name"
                        type="name"
                        name="name"
                        value={data.name}
                        className="uk-input"
                        autoComplete="name"
                        isFocused={true}
                        onChange={(e) => setData('name', e.target.value)}
                    />

                    <InputError message={errors.name} className="" />
                </div>

                <div className='uk-margin'>
                    <label htmlFor="email" value="Email">
                        Email
                    </label>

                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="uk-input"
                        autoComplete="username"
                        isFocused={true}
                        onChange={(e) => setData('email', e.target.value)}
                    />

                    <InputError message={errors.email} className="" />
                </div>

                <div className="uk-margin">
                    <label htmlFor="password" value="Password">
                        Password
                    </label>

                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="uk-input"
                        autoComplete="current-password"
                        onChange={(e) => setData('password', e.target.value)}
                    />

                    <InputError message={errors.password} className="" />
                </div>

                <div className="uk-margin">
                    <label htmlFor="password_confirmation">
                        Password Confirmation
                    </label>

                    <TextInput
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        className="uk-input"
                        onChange={(e) => setData('password_confirmation', e.target.value)}
                    />

                    <InputError message={errors.password_confirmation} className="" />
                </div>


                <div className="uk-flex uk-flex-middle uk-grid-small">
                    <div class="uk-width-expand uk-text-right">
                        <Link
                            href={route('login')}
                            className=""
                        >
                            Already registered?
                        </Link>
                    </div>

                    <div class="uk-width-auto">
                        <button className="uk-button uk-button-primary" disabled={processing}>
                            Register
                        </button>
                    </div>
                </div>

            </form>
        </GuestLayout>
    );
}
