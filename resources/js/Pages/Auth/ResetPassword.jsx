import { useEffect } from 'react';
import { Head, useForm } from '@inertiajs/react';

import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import TextInput from '@/Components/TextInput';

export default function ResetPassword({ token, email }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        token: token,
        email: email,
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

        post(route('password.store'));
    };

    return (
        <GuestLayout>
            <Head title="Reset Password" />

            <form onSubmit={submit}>
                <div className='uk-margin'>
                    <label htmlFor="email">
                        Email
                    </label>

                    <TextInput
                        id="email"
                        type="email"
                        name="email"
                        value={data.email}
                        className="uk-input"
                        autoComplete="username"
                        onChange={(e) => setData('email', e.target.value)}
                    />

                    <InputError message={errors.email} className="" />
                </div>

                <div className="uk-margin">
                    <label htmlFor="password">
                        Password
                    </label>

                    <TextInput
                        id="password"
                        type="password"
                        name="password"
                        value={data.password}
                        className="uk-input"
                        autoComplete="new-password"
                        isFocused={true}
                        onChange={(e) => setData('password', e.target.value)}
                    />

                    <InputError message={errors.password} className="" />
                </div>

                <div className="uk-margin">
                    <label htmlFor="password_confirmation" >
                        Confirm Password
                    </label>

                    <TextInput
                        type="password"
                        name="password_confirmation"
                        value={data.password_confirmation}
                        className="uk-input"
                        autoComplete="new-password"
                        onChange={(e) => setData('password_confirmation', e.target.value)}
                    />

                    <InputError message={errors.password_confirmation} className="mt-2" />
                </div>

                <div className="uk-flex uk-flex-center uk-margin">
                    <button className="uk-button uk-button-primary" disabled={processing}>
                        Reset Password
                    </button>
                </div>
            </form>
        </GuestLayout>
    );
}
