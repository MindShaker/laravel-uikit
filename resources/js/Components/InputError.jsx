export default function InputError({ message, className = '', ...props }) {
    return message ? (
        <p {...props} className={'uk-text-small uk-text-danger uk-margin-small ' + className}>
            {message}
        </p>
    ) : null;
}
