import { useEffect } from 'react';
import { Head, useForm } from '@inertiajs/react';

import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import TextInput from '@/Components/TextInput';

export default function ConfirmPassword() {
    const { data, setData, post, processing, errors, reset } = useForm({
        password: '',
    });

    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();

        post(route('password.confirm'));
    };

    return (
        <GuestLayout>
            <Head title="Confirm Password" />

            <div className="uk-margin uk-text-muted">
                This is a secure area of the application. Please confirm your password before continuing.
            </div>

            <form onSubmit={submit}>
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
                        isFocused={true}
                        onChange={(e) => setData('password', e.target.value)}
                    />

                    <InputError message={errors.password} className="" />
                </div>

                <div className="uk-margin uk-flex uk-flex-center">
                    <button className="uk-button uk-button-primary" disabled={processing}>
                        Confirm
                    </button>
                </div>
            </form>
        </GuestLayout>
    );
}
