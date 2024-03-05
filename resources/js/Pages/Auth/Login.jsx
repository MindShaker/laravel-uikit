import { useEffect } from 'react';
import { Head, Link, useForm } from '@inertiajs/react';

import Checkbox from '@/Components/Checkbox';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import TextInput from '@/Components/TextInput';

export default function Login({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: false,
    });

    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();

        post(route('login'));
    };

    return (
        <GuestLayout>
            <Head title="Log in" />

            {status && <div className="uk-text-success">{status}</div>}

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
                        isFocused={true}
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
                        autoComplete="current-password"
                        onChange={(e) => setData('password', e.target.value)}
                    />

                    <InputError message={errors.password} className="" />
                </div>

                <div className="uk-margin">
                    <label className="">
                        <Checkbox
                            name="remember"
                            className='uk-checkbox'
                            checked={data.remember}
                            onChange={(e) => setData('remember', e.target.checked)}
                        />
                        <span className="uk-margin-small-left">Remember me</span>
                    </label>
                </div>

                <div className="uk-flex uk-flex-middle uk-grid-small">
                    <div class="uk-width-expand uk-text-right">
                        {canResetPassword && (
                            <Link
                                href={route('password.request')}
                                className=""
                            >
                                Forgot your password?
                            </Link>
                        )}
                    </div>

                    <div class="uk-width-auto">
                        <button className="uk-button uk-button-secondary uk-border-rounded" disabled={processing}>
                            Log in
                        </button>
                    </div>
                </div>
            </form>
        </GuestLayout>
    );
}
