import { useState, createContext, useContext, Fragment } from 'react';
import { Link } from '@inertiajs/react';

const DropDownContext = createContext();

const Dropdown = ({ children }) => {
    const [open, setOpen] = useState(false);

    const toggleOpen = () => {
        setOpen((previousState) => !previousState);
    };

    return (
        <DropDownContext.Provider value={{ open, setOpen, toggleOpen }}>
            <div className="uk-position-relative">{children}</div>
        </DropDownContext.Provider>
    );
};

const Trigger = ({ children }) => {
    const { open, setOpen, toggleOpen } = useContext(DropDownContext);

    return (
        <>
            <div className='cursor-pointer' onClick={toggleOpen}>{children}</div>

            {open && <div className="uk-position-fixed uk-position-top uk-width-1-1 uk-height-1-1" onClick={() => setOpen(false)}></div>}
        </>
    );
};

const Content = ({ children }) => {
    const { open, setOpen } = useContext(DropDownContext);

    return (
        <>
            {open &&
                <div
                    className={`uk-drop uk-dropdown uk-flex `}
                    style={{ right: 0 }}
                    onClick={() => setOpen(false)}
                >
                    <ul className={`uk-nav uk-dropdown-nav`}>{children}</ul>
                </div>
            }
        </>
    );
};

const DropdownLink = ({ className = '', children, ...props }) => {
    return (
        <li>
            <Link
                {...props}
                className={
                    ' ' +
                    className
                }
            >
                {children}
            </Link>
        </li>
    );
};

Dropdown.Trigger = Trigger;
Dropdown.Content = Content;
Dropdown.Link = DropdownLink;

export default Dropdown;
