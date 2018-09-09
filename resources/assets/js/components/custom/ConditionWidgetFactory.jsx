import React from 'react';
import { NodeFactory, DiagramEngine } from 'storm-react-diagrams';
import { ConditionNodeModel } from './ConditionNodeModel';
import { ConditionNodeWidget } from './ConditionNodeWidget';

export class ConditionWidgetFactory extends NodeFactory<ConditionNodeModel> {
    constructor() {
        super("condition");
    }

    generateReactWidget(diagramEngine: DiagramEngine, node: ConditionNodeModel): JSX.Element {
        return React.createElement(ConditionNodeWidget, {
            node: node,
            diagramEngine: diagramEngine
        });
    }

    getNewInstance(initialConfig?: any): ConditionNodeModel {
        return new ConditionNodeModel();
    }
}

