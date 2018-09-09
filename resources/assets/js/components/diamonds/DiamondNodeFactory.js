import * as SRD from "storm-react-diagrams";
import { DiamonNodeWidgetFactory } from "./DiamondNodeWidget";
import { DiamondNodeModel } from "./DiamondNodeModel";

export class DiamondNodeFactory extends SRD.NodeFactory {
    constructor() {
        super("diamond");
    }

    generateReactWidget(diagramEngine: SRD.DiagramEngine, node: SRD.NodeModel): JSX.Element {
        return DiamonNodeWidgetFactory({ node: node });
    }

    getNewInstance() {
        return new DiamondNodeModel();
    }
}