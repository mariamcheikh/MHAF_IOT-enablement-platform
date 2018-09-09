import React from 'react';
import { DefaultNodeModel, DiagramEngine, DefaultPortLabel } from 'storm-react-diagrams';

import Select from 'react-select';
import AutosizeInput from 'react-input-autosize';
import 'react-select/dist/react-select.css';

export interface ConditionNodeWidgetProps {
    node: DefaultNodeModel;
    diagramEngine: DiagramEngine;
}

export interface ConditionNodeWidgetState {}

export class ConditionNodeWidget extends React.Component<ConditionNodeWidgetProps, ConditionNodeWidgetState> {
    constructor(props: ConditionNodeWidgetProps) {
        super(props);
        this.state = {
            selectedOption: '',
        };
    }

    handleChange(selectedOption) {
        this.setState({ selectedOption });
        console.log(`Selected: ${selectedOption.label}`);
    }

    generatePort(port) {
        return <DefaultPortLabel model={port} key={port.id} />;
    }

    test()
    {

    }

    render() {
        const { selectedOption } = this.state;
        return (
            <div className="basic-node" style={{ background: "#272727", width: 150 }}>
                <div className="title">
                    <div className="name"><h5 style={{ textAlign: 'center' }}>Condition</h5></div>
                </div>
                <div className="content">
                    <Select
                        name="form-field-name"
                        style={{width: 90 + "%", margin: 5 + "%"}}

                        placeholder="Condition ..."
                        onChange={this.handleChange}
                        value={selectedOption}
                        options={[
                            { value: '0', label: '==' },
                            { value: '1', label: '!=' },
                            { value: '2', label: '>=' },
                            { value: '3', label: '<=' },
                            { value: '4', label: '>' },
                            { value: '5', label: '<' },
                        ]}
                    />

                    <input type="text" name="name" placeholder="Value ..." style={{width: 90 + "%", margin: 5 + "%", color: "#000000"}} />

                </div>

                <div className="ports">
                    <div className="in" style={{width: 50 + "%"}}>{_.map(this.props.node.getInPorts(), this.generatePort.bind(this))}</div>
                    <div className="out">{_.map(this.props.node.getOutPorts(), this.generatePort.bind(this))}</div>
                </div>
            </div>
        );
    }
}

ConditionNodeWidget.defaultProps = {
    size: 300,
    node: null
};
