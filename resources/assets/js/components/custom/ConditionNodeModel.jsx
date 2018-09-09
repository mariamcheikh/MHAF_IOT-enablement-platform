import { DefaultPortModel, NodeModel } from 'storm-react-diagrams';

export class ConditionNodeModel extends NodeModel {

    constructor()
    {
        super('condition');
        this.addPort(new DefaultPortModel(false, 'in-1', 'In'));
        var port = this.addPort(new DefaultPortModel(false, 'out-1', 'Out'));
    }

    deSerialize(object) {
        super.deSerialize(object);
        this.name = object.name;
        this.color = object.color;
    }

    serialize() {
        return _.merge(super.serialize(), {
            name: this.name,
            color: this.color
        });
    }

    getInPorts(): DefaultPortModel[] {
        return _.filter(this.ports, portModel => {
            return portModel.in;
        });
    }

    getOutPorts(): DefaultPortModel[] {
        return _.filter(this.ports, portModel => {
            return !portModel.in;
        });
    }
}
